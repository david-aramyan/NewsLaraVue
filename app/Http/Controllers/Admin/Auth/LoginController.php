<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected string $redirectTo = RouteServiceProvider::DASHBOARD;

  public function __construct()
  {
    $this->middleware('guest:admin')->except('logout');
    $this->middleware('auth:admin')->only('logout');
  }

  /**
   * Show the application's login form.
   *
   * @return View
   */
  public function showLoginForm(): View
  {
    return view('admin.auth.login');
  }

  /**
   * Get the guard to be used during authentication.
   *
   * @return StatefulGuard
   */
  protected function guard(): StatefulGuard
  {
    return Auth::guard(Admin::GUARD);
  }

  /**
   * Get the login username to be used by the controller.
   *
   * @return string
   */
  protected function username(): string
  {
    return array_key_exists('email', request()->all()) ? 'email' : 'username';
  }
}
