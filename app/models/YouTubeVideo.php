<?php
namespace App\Models;

use October\Rain\Database\Model;

use October\Rain\Database\Traits\Validation;

final class YouTubeVideo extends Model
{
    use Validation;

    /**
     * @inheritDoc
     */
    protected $table = 'eqz_youtube_videos';

    /**
     * @inheritDoc
     */
    public $rules = [
        'title' => 'string|required|max:255',
        'video_id' => 'string|required|max:50',
        'video_thumb_url' => 'string|required|max:50',
        'upload_date' => 'required'
    ];

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'title',
        'video_id',
        'video_thumb_url',
        'upload_date'
    ];
}
