<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\Admin\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
  /**
   * Controller service
   *
   * @var PostService
   */
  public PostService $service;

  /**
   * PostsController constructor.
   *
   * @param PostService $service
   */
  public function __construct(PostService $service)
  {
    $this->service = $service;
  }

  /**
   * Display a listing of the resource.
   *
   * @return View
   */
  public function index(): View
  {
    return view('admin.posts.index', [
      'posts' => $this->service->all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return View
   */
  public function create(): View
  {
    return view('admin.posts.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param CreatePostRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(CreatePostRequest $request): JsonResponse
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
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
