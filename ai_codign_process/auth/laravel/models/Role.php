<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Validation\Rule;

class Role extends Model
{
    use HasFactory;

    // Database schema definition This schema defines the structure of the  table.  This is used for migrations, validation, and documentation purposes.
    const ROLE_SCHEMA = [
        'id' => ['type' => 'bigint', 'unsigned' => true, 'auto_increment' => true, 'primary' => true],
        'name' => ['type' => 'string', 'unique' => true, 'required' => true],
        'description' => ['type' => 'text', 'nullable' => true],
        'created_at' => ['type' => 'timestamp', 'nullable' => true],
        'updated_at' => ['type' => 'timestamp', 'nullable' => true],
        '_relationships' => [
            'users' => ['type' => 'belongsToMany', 'model' => 'User', 'pivot_table' => 'role_user'],
            'permissions' => ['type' => 'belongsToMany', 'model' => 'Permission', 'pivot_table' => 'permission_role'],
        ],
    ];

    protected $fillable = ['name', 'description'];

    public static function getValidationRules(bool $isUpdate = false, int $roleId = null): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                $isUpdate
                    ? Rule::unique('roles')->ignore($roleId)
                    : 'unique:roles,name',
            ],
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ];
    }

    // The users that belong to the role.
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    // The permissions that belong to the role.
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
