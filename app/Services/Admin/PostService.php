<?php


namespace App\Services\Admin;

use App\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use App\Http\Requests\CreatePostRequest;

class PostService
{
  /**
   * Get all posts
   * @return Collection
   */
  public function all(): Collection
  {
    return Post::all();
  }

  /**
   * @param CreatePostRequest $request
   * @return Post
   */
  public function create(CreatePostRequest $request): Post
  {
    return Post::create(Arr::add(
      $request->except('image'),
      'img',
      $request->upload()
    ));
  }

  public function update($request): Post
  {

  }

  public function delete($request)
  {
    // TODO: Implement delete() method.
  }
}
