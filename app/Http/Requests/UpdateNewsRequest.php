<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class UpdateNewsRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return $this->user('admin')->hasRole('admin');
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'title' => 'required|string|max:255',
      'image' => 'nullable|file|image',
      'text' => 'required|string',
    ];
  }

  /**
   * Upload image & get the path
   *
   * @return string
   */
  public function upload(): string
  {
    $file = $this->file('image');

    $path = $file->storeAs(
      'admin/news', time() . '-' . $file->getClientOriginalName(),
      ['disk' => 'public']
    );

    return Storage::url($path);
  }
}
