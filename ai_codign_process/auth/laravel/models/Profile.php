<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\Rule;

class Profile extends Model
{
    use HasFactory;

    // Database schema definition This schema defines the structure of the  table.  This is used for migrations, validation, and documentation purposes.
    const PROFILE_SCHEMA = [
        'id' => ['type' => 'bigint', 'unsigned' => true, 'auto_increment' => true, 'primary' => true],
        'user_id' => ['type' => 'bigint', 'unsigned' => true, 'unique' => true, 'foreign' => ['references' => 'id', 'on' => 'users', 'onDelete' => 'cascade']],
        'first_name' => ['type' => 'string', 'nullable' => true],
        'last_name' => ['type' => 'string', 'nullable' => true],
        'avatar' => ['type' => 'string', 'nullable' => true],
        'phone_number' => ['type' => 'string', 'nullable' => true],
        'address' => [
            'type' => 'text',
            'nullable' => true,
            'cast' => 'array',
            'json' => true,
            'schema' => [
                'street' => ['type' => 'string', 'nullable' => true],
                'city' => ['type' => 'string', 'nullable' => true],
                'state' => ['type' => 'string', 'nullable' => true],
                'zip_code' => ['type' => 'string', 'nullable' => true],
                'country' => ['type' => 'string', 'nullable' => true],
            ]
        ],
        'date_of_birth' => ['type' => 'date', 'nullable' => true],
        'bio' => ['type' => 'text', 'nullable' => true, 'maxLength' => 500],
        'created_at' => ['type' => 'timestamp', 'nullable' => true],
        'updated_at' => ['type' => 'timestamp', 'nullable' => true],
        '_relationships' => [
            'user' => ['type' => 'belongsTo', 'model' => 'User', 'foreign_key' => 'user_id'],
        ],
    ];

    protected $fillable = ['user_id', 'first_name', 'last_name', 'avatar', 'phone_number', 'address', 'date_of_birth', 'bio'];


    protected $casts = [
        'address' => 'array',
        'date_of_birth' => 'date',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getValidationRules(bool $isUpdate = false): array
    {
        $rules = [
            'first_name' => 'sometimes|string|max:255|nullable',
            'last_name' => 'sometimes|string|max:255|nullable',
            'phone_number' => 'sometimes|string|max:255|nullable',
            'date_of_birth' => 'sometimes|date_format:Y-m-d|nullable',
            'bio' => 'sometimes|string|max:500|nullable',
            'address' => 'sometimes|array|nullable',
            'address.street' => 'sometimes|string|max:255|nullable',
            'address.city' => 'sometimes|string|max:255|nullable',
            'address.state' => 'sometimes|string|max:255|nullable',
            'address.zip_code' => 'sometimes|string|max:255|nullable',
            'address.country' => 'sometimes|string|max:255|nullable',
        ];

        if ($isUpdate) {
            // Rules for when avatar is sent as a file object for updates
            $rules['avatar'] = 'sometimes|array';
            $rules['avatar.data'] = 'sometimes:avatar|string'; // base64 data
            $rules['avatar.filename'] = 'sometimes:avatar|string';
            $rules['avatar.remove_current_img'] = 'sometimes|boolean';
        } else {
            // Rules for when avatar is sent as a file object for creation
            $rules['avatar'] = 'nullable|array';
            $rules['avatar.data'] = 'nullable|string';
            $rules['avatar.filename'] = 'nullable|string';
        }

        return $rules;
    }
}