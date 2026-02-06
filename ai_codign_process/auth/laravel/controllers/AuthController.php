<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password as PasswordRules;

class AuthController extends Controller
{
    /**
     * Register a new user.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', PasswordRules::min(8)],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = DB::transaction(function () use ($request) {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Profile::create(['user_id' => $user->id]);

            // Assign a default 'user' role
            $userRole = Role::where('name', 'user')->first();
            if ($userRole) {
                $user->roles()->attach($userRole);
            }

            return $user;
        });

        return response()->json([
            'message' => 'User registered successfully',
            'success' => true,
        ], 201);
    }

    /**
     * Log the user in.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_or_username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $loginField = filter_var($request->email_or_username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($loginField, $request->email_or_username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user->last_login_at = now();
        $user->save();
        
        // Still create a token for API-only clients.
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    /**
     * Log the user out (revoke the token).
     */
    public function logout(Request $request)
    {
        try {
            // Ensure user is authenticated
            if (!$request->user()) {
                return response()->json([
                    'message' => 'User not authenticated',
                    'success' => false
                ], 401);
            }
            
            // Get the current token ID and delete it
            $tokenId = $request->user()->currentAccessToken()->id;
            $request->user()->tokens()->where('id', $tokenId)->delete();
            
            return response()->json([
                'message' => 'Successfully logged out',
                'success' => true
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Logout failed',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error',
                'success' => false
            ], 500);
        }
    }
    
    /**
     * Get the authenticated User.
     */
    public function user(Request $request)
    {
        $data =$this->formatUserResponseData($request->user());
        return response()->json($data, 200);
    }

    /**
     * Send a password reset link.
     */
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Password reset link sent.'], 200)
            : response()->json(['message' => __($status)], 400);
    }

    /**
     * Reset the user's password.
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', PasswordRules::min(8)],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => 'Password has been reset successfully.'], 200)
            : response()->json(['message' => __($status)], 400);
    }

    /**
     * Format the user data and add the permissionsMap.
     *
     * @param \App\Models\User $user
     * @return array
     */
    private function formatUserResponseData(User $user): array
    {
        // Eager load relationships if they are not already loaded
        $user->loadMissing('profile', 'roles.permissions');

        // Create the permissionsMap from the user's roles and permissions
        $permissionsMap = $user->roles->flatMap(function ($role) {
            return $role->permissions;
        })->pluck('name')->mapWithKeys(function ($name) {
            return [$name => true];
        });

        // Convert the user model to an array and add the permissionsMap
        $userData = $user->toArray();
        $userData['permissionsMap'] = $permissionsMap;

        // Remove 'permissions' key from every role
        if (isset($userData['roles']) && is_array($userData['roles'])) {
            foreach ($userData['roles'] as &$role) {
                unset($role['permissions']);
            }
        }
        
        return $userData;
    }
}