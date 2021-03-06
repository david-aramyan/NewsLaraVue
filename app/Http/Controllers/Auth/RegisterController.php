<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected string $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }


  /**
   * Show the application registration form.
   *
   * @return View
   */
  public function showRegistrationForm(): View
  {
    return view('client.auth.register');
  }


  /**
   * Get a validator for an incoming registration request.
   *
   * @param array $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param array $data
   * @return User
   */
  protected function create(array $data): User
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);
  }

  /**
   * The user has been registered.
   *
   * @param Request $request
   * @param  User $user
   * @return void
   */
  protected function registered(Request $request, $user): void
  {
    $user->roles()->attach(Role::find(2));
  }
}
