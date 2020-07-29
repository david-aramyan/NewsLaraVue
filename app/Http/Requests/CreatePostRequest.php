<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(): bool
  {
    return $this->user()->hasRole('admin');
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(): array
  {
    return [
      'title' => 'required|string|max:255',
      'image' => 'required|file|image',
      'text' => 'required|string',
    ];
  }

  /**
   * Uploading image & getting path
   *
   * @return string
   */
  public function upload(): string
  {
    $file = $this->file('image');

    $path = $file->storeAs(
      'admin/posts', time() . '-' . $file->getClientOriginalName(),
      ['disk' => 'public']
    );

    return Storage::url($path);
  }
}
