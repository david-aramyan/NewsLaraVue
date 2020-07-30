<?php

namespace App\Providers;

use App\Http\View\Composers\ClientAuthComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\AdminAuthComposer;

class ViewServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot(): void
  {
    View::composer('admin.*', AdminAuthComposer::class);
    View::composer(['client.news.index', 'client.news.show'], ClientAuthComposer::class);
  }
}
