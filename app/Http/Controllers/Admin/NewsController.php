<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateNewsRequest;
use App\News;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\Admin\NewsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;

class NewsController extends Controller
{
  /**
   * Controller service
   *
   * @var NewsService
   */
  public NewsService $service;

  /**
   * NewsController constructor.
   *
   * @param NewsService $service
   */
  public function __construct(NewsService $service)
  {
    $this->service = $service;
    $this->middleware('auth:admin');
  }

  /**
   * Display a listing of the resource.
   *
   * @return View
   */
  public function index(): View
  {
    return view('admin.news.index', [
      'news' => $this->service->all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return View
   */
  public function create(): View
  {
    return view('admin.news.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param CreateNewsRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(CreateNewsRequest $request): JsonResponse
  {
    $post = $this->service->create($request);

    return response()->json(compact('post'), Response::HTTP_CREATED);
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param News $news
   * @return View
   */
  public function edit(News $news): View
  {
    return view('admin.news.edit', [
      'news' => $news
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param UpdateNewsRequest $request
   * @param News $news
   * @return News
   */
  public function update(UpdateNewsRequest $request, News $news): News
  {
    return $this->service->update($request, $news);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param News $news
   * @return JsonResponse
   */
  public function destroy(News $news): JsonResponse
  {
    $status = $this->service->delete($news) ? Response::HTTP_OK : Response::HTTP_INTERNAL_SERVER_ERROR;

    $message = $status === Response::HTTP_OK ? 'News deleted.' : 'Something went\'s wrong';

    return response()->json(compact('message'), $status);
  }
}
