<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Permission model
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Role $role
 */
class Permission extends Model
{
  /**
   * @var string[]
   */
  protected $fillable = ['name', 'description'];

  /**
   * Role relation
   *
   * @return BelongsTo
   */
  public function role(): BelongsTo
  {
    return $this->belongsTo(
      Role::class,
      'role_id',
      'id'
    );
  }

  /**
   * Check's if permission is related to given role
   *
   * @param string $role
   * @return bool
   */
  public function isForRole(string $role): bool
  {
    return $this->role->name === $role;
  }
}
