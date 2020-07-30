<?php


namespace App\Http\View\Composers;

use App\User;
use Illuminate\View\View;

class ClientAuthComposer
{
  /**
   * @var string
   */
  protected string $auth;

  /**
   * ClientAuthComposer constructor.
   */
  public function __construct()
  {
    /** @var User $user **/
    $user = auth()->user();

    $this->auth = json_encode([
      'user' => $user,
      'check' => auth()->check()
    ]);
  }

  /**
   * @param View $view
   */
  public function compose(View $view): void
  {
    $view->with('auth', $this->auth);
  }
}
