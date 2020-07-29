<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

interface Service
{
  /**
   * @param FormRequest $request
   * @return Model
   */
  public function create(FormRequest $request): Model;

  /**
   * @param FormRequest $request
   * @return Model
   */
  public function update(FormRequest $request): Model;

  public function delete($request);
}
