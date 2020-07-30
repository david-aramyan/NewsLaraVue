<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\View\View;
use App\Services\Client\NewsService;

class NewsController extends Controller
{
  public NewsService $service;

  /**
   * NewsController constructor.
   *
   * @param NewsService $service
   */
  public function __construct(NewsService $service)
  {
    $this->service = $service;
  }

  /**
   * News page
   *
   * @return View
   */
  public function index(): View
  {
    return view('client.news.index', [
      'news' => $this->service->all()
    ]);
  }

  /**
   * Show's single news
   *
   * @param News $news
   * @return View
   */
  public function show(News $news): View
  {
    return view('client.news.show', [
      'item' => $news
    ]);
  }
}
