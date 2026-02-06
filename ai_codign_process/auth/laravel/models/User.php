<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification; 
use App\Traits\HasPermissions; 

class User extends Authenticatable
{
    // Use HasApiTokens for Sanctum, along with standard traits and our new permissions trait
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;

    // Enum-like constants for auth providers.
    const AUTH_PROVIDERS = ['local', 'google'];

    // Database schema definition This schema defines the structure of the  table.  This is used for migrations, validation, and documentation purposes.
    const USER_SCHEMA = [
        'id' => ['type' => 'bigint', 'unsigned' => true, 'auto_increment' => true, 'primary' => true],
        'username' => ['type' => 'string', 'unique' => true, 'required' => true],
        'email' => ['type' => 'string', 'unique' => true, 'required' => true],
        'phone_number' => ['type' => 'string', 'nullable' => true, 'unique' => true],
        'email_verified_at' => ['type' => 'timestamp', 'nullable' => true],
        'password' => ['type' => 'string', 'required' => true],
        'remember_token' => ['type' => 'string', 'nullable' => true, 'length' => 100],
        'is_active' => ['type' => 'boolean', 'default' => true, 'index' => true],
        'last_login_at' => ['type' => 'timestamp', 'nullable' => true],
        'google_id' => ['type' => 'string', 'nullable' => true, 'unique' => true],
        'auth_provider' => ['type' => 'string', 'default' => 'local', 'enum' => self::AUTH_PROVIDERS],
        'created_at' => ['type' => 'timestamp', 'nullable' => true],
        'updated_at' => ['type' => 'timestamp', 'nullable' => true],
        '_relationships' => [
            'profile' => ['type' => 'hasOne', 'model' => 'Profile', 'foreign_key' => 'user_id'],
            'roles' => ['type' => 'belongsToMany', 'model' => 'Role', 'pivot_table' => 'role_user'],
        ],
    ];
    
    protected $fillable = ['username', 'email', 'phone_number', 'password', 'is_active', 'last_login_at', 'google_id', 'auth_provider'];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    // Get the user's profile.
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    // The roles that belong to the user.
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // Activities owned by the user.
    public function ownedActivities(): HasMany
    {
        return $this->hasMany(Activity::class, 'owner_id');
    }

    // Activities assigned to the user.
    public function assignedActivities(): HasMany
    {
        return $this->hasMany(Activity::class, 'assigned_to');
    }

    // Activities created by the user.
    public function createdActivities(): HasMany
    {
        return $this->hasMany(Activity::class, 'created_by');
    }

    // Activities completed by the user.
    public function completedActivities(): HasMany
    {
        return $this->hasMany(Activity::class, 'completed_by');
    }
}
