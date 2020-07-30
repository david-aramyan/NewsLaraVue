<?php


namespace App\Services\Admin;

use App\News;
use App\Admin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Database\Eloquent\Collection;

class NewsService
{
  /**
   * Get all posts
   *
   * @return Collection
   */
  public function all(): Collection
  {
    return News::all();
  }

  /**
   * Create news resource
   *
   * @param CreateNewsRequest $request
   * @return News
   */
  public function create(CreateNewsRequest $request): News
  {
    /** @var Admin|null $admin */
    $admin = Auth::guard('admin')->user();

    /** @var News $news */
    $news = $admin->news()->create(Arr::add(
      $request->except('image'),
      'img',
      $request->upload()
    ));

    return $news;
  }

  /**
   * Update's news resource
   *
   * @param UpdateNewsRequest $request
   * @param News $news
   * @return News
   */
  public function update(UpdateNewsRequest $request, News $news): News
  {
    if ($request->hasFile('image')) {
      $request->merge(['img' => $request->upload()]);
    }

    $news->update($request->except('image'));

    return $news->fresh();
  }

  /**
   * Soft Delete's resource
   *
   * @param News $news
   * @return bool
   */
  public function delete(News $news): bool
  {
    try {
      $news->delete();

      return true;
    } catch (\Exception $e) {
      return false;
    }
  }
}
