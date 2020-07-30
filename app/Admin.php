<?php

namespace App;

use App\Traits\Roleable;
use App\Traits\Permissionable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Admin Model
 *
 * @method static Admin create(array $attrs)
 */
class Admin extends Authenticatable
{
  use Notifiable, Roleable, Permissionable;

  /**
   * @var string
   */
  public string $roles_pivot = 'admin_role';

  /**
   * @var string
   */
  public string $permissions_pivot = 'admin_permission';

  /**
   * Guard
   *
   * @var string
   */
  public const GUARD = 'admin';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * news relation
   *
   * @return HasMany
   */
  public function news(): HasMany
  {
    return $this->hasMany(News::class, 'admin_id', 'id');
  }
}
