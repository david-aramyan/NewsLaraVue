<?php

namespace App\Http\View\Composers;

use App\User;
use App\Admin;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class AdminAuthComposer
{
  /**
   * @var string|null
   */
  protected ?string $guard = 'admin';

  /**
   * @var string
   */
  protected string $auth;

  public function __construct()
  {
    /** @var Admin $user **/
    $user = auth($this->guard)->user();

    $this->auth = json_encode([
      'user' => $user,
      'check' => auth()->check()
    ]);
  }

  /**
   * @param View $view
   */
  public function compose(View $view)
  {
    $view->with('auth', $this->auth);
  }
}
