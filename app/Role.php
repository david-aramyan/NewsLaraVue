<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Role model
 *
 * @property int id
 * @property string name
 * @property Collection permissions
 * @method static Role find(int $id)
 */
class Role extends Model
{
  /**
   * @var string[]
   */
  protected $fillable = ['name', 'code', 'description'];

  /**
   * Role User Relation
   *
   * @return BelongsToMany
   */
  public function users(): BelongsToMany
  {
    return $this->belongsToMany(
      User::class,
      'user_role',
      'role_id',
      'user_id',
      'id',
      'id'
    );
  }

  /**
   * Role Admin Relation
   *
   * @return BelongsToMany
   */
  public function admins(): BelongsToMany
  {
    return $this->belongsToMany(
      Admin::class,
      'admin_role',
      'role_id',
      'admin_id',
      'id',
      'id'
    );
  }

  /**
   * Role Permission Relation
   *
   * @return hasMany
   */
  public function permissions(): hasMany
  {
    return $this->hasMany(
      Permission::class,
      'role_id',
      'id'
    );
  }

  /**
   * Checks if Role has Permission
   *
   * @param string $permission
   * @return bool
   */
  public function hasPermission(string $permission)
  {
    return $this->permissions->contains('name', $permission);
  }
}
