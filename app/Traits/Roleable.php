<?php

namespace App\Traits;

use App\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Trait Roleable
 * @package App\Traits
 * @method BelongsToMany belongsToMany(string $model, string $table)
 */
trait Roleable
{
  /**
   * @return BelongsToMany
   */
  public function roles(): BelongsToMany
  {
    return $this->belongsToMany(Role::class, $this->roles_pivot);
  }

  /**
   * Check if roleable has specified role
   *
   * @param string|array $role
   * @return bool
   */
  public function hasRole($role): bool
  {
    $roles = (is_string($role)) ? [$role] : $role;

    foreach ($roles as $r)
      if ($this->roles()->get()->contains('name', $r)) return true;

    return false;
  }
}
