<?php

namespace App\Traits;

use App\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Trait Permissionable
 *
 * @package App\Traits
 * @property Collection roles
 * @property Collection permissions
 * @method BelongsToMany belongsToMany(string $model, string $table)
 */
trait Permissionable
{
  /**
   * Permissions Relation
   *
   * @return BelongsToMany
   */
  public function permissions(): BelongsToMany
  {
    return $this->belongsToMany(Permission::class, $this->permissions_pivot);
  }

  /**
   * Check if permissionable has specified permission
   *
   * @param string|string[] $permission
   * @return bool
   */
  public function hasPermissions($permission): bool
  {
    $permissions = (is_string($permission)) ? [$permission] : $permission;

    foreach ($this->roles as $role) {
      foreach ($permissions as $name)
        return $role->hasPermission($name) && $this->permissions->contains('name', $name);
    };

    return false;
  }
}
