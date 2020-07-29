<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 *
 * @package App
 * @property int id
 * @property int admin_id
 * @property string title
 * @property string text
 * @property string img
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 * @method static Post create(array $attrs)
 */
class Post extends Model
{
  use SoftDeletes;

  /**
   * @var string[]
   */
  protected $fillable = ['title', 'text', 'img'];

  /**
   * @var string[]
   */
  protected $casts = [
    'deleted_at' => 'date'
  ];

  /**
   * admin relation
   *
   * @return BelongsTo
   */
  public function admin(): BelongsTo
  {
    return $this->belongsTo(Admin::class, 'admin_id', 'id');
  }
}
