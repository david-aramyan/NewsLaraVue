<?php

namespace App;

use App\Traits\Roleable;
use App\Traits\Permissionable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable, Roleable, Permissionable;

  /**
   * User model guard name
   */
  public const GUARD = 'web';

  /**
   * @var string
   */
  public string $roles_pivot = 'user_role';

  /**
   * @var string
   */
  public string $permissions_pivot = 'user_permission';

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
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}
