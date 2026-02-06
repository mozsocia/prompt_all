<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Validation\Rule;

class Permission extends Model
{
    use HasFactory;

    // Database schema definition This schema defines the structure of the  table.  This is used for migrations, validation, and documentation purposes.
    const PERMISSION_SCHEMA = [
        'id' => ['type' => 'bigint', 'unsigned' => true, 'auto_increment' => true, 'primary' => true],
        'name' => ['type' => 'string', 'unique' => true, 'required' => true],
        'description' => ['type' => 'text', 'nullable' => true],
        'created_at' => ['type' => 'timestamp', 'nullable' => true],
        'updated_at' => ['type' => 'timestamp', 'nullable' => true],
        '_relationships' => [
            'roles' => ['type' => 'belongsToMany', 'model' => 'Role', 'pivot_table' => 'permission_role'],
        ],
    ];

    protected $fillable = ['name', 'description'];


    public static function getValidationRules(bool $isUpdate = false, $permissionId = null): array
    {
        $nameRule = ['required', 'string', 'max:255'];

        if ($isUpdate) {
            $nameRule[] = Rule::unique('permissions')->ignore($permissionId);
        } else {
            $nameRule[] = 'unique:permissions,name';
        }

        return [
            'name' => $nameRule,
            'description' => 'nullable|string',
        ];
    }


    // The roles that belong to the permission.
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
