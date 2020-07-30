<?php


namespace App\Services\Client;


use App\News;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class NewsService
{
  /**
   * Get all news
   *
   * @param Request $request
   * @return Collection
   */
  public function all(?Request $request = null): Collection
  {
    return News::all();
  }
}
