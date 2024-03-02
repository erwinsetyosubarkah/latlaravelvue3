<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
  use HasFactory,InteractsWithMedia;

  /**
   * The name of the "created at" column.
   *
   * @var string
   */
  const CREATED_AT = 'dt_created_at';

  /**
   * The name of the "updated at" column.
   *
   * @var string
   */
  const UPDATED_AT = 'dt_updated_at';

  /**
   * The primary key for the model.
   *
   * @var string
   */
  protected $primaryKey = 'i_id';



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'v_title',
        'v_image',
        'tx_content',
        'dt_created_at',
        'dt_updated_at',
        'dt_deleted_at'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

}
