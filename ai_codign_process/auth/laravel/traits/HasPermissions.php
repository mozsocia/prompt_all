<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait HasPermissions
{
    /**
     * Cache for user permissions to avoid repeated queries within a single request.
     *
     * @var \Illuminate\Database\Eloquent\Collection|null
     */
    protected $permissionCache;

    /**
     * Check if the user has a specific permission.
     *
     * @param string $permissionName
     * @return bool
     */
    public function hasPermissionTo(string $permissionName): bool
    {
        $permissions = $this->getAllPermissions();
        return $permissions->contains('name', $permissionName);
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string $roleName
     * @return bool
     */
    public function hasRole(string $roleName): bool
    {
        return $this->roles->contains('name', $roleName);
    }

    /**
     * Get all permissions for the user, utilizing an in-memory cache.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getAllPermissions(): Collection
    {
        if ($this->permissionCache === null) {
            $this->loadPermissions();
        }
        return $this->permissionCache;
    }

    /**
     * Load all permissions from the database and populate the cache.
     */
    protected function loadPermissions(): void
    {
        // Eager load roles and their associated permissions to prevent N+1 issues.
        if (!$this->relationLoaded('roles.permissions')) {
            $this->load('roles.permissions');
        }

        // flatMap and unique return a base Illuminate\Support\Collection.
        $permissions = $this->roles->flatMap(function ($role) {
            return $role->permissions;
        })->unique('id');

        // We must convert it back to an Illuminate\Database\Eloquent\Collection to satisfy the type hint.
        $this->permissionCache = new Collection($permissions);
    }

    /**
     * Flush the in-memory permission cache for this user instance.
     * Essential for long-lived application processes like Laravel Octane.
     */
    public function forgetPermissions(): void
    {
        $this->permissionCache = null;
    }
}