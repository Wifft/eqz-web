<?php
namespace App\Components;

use October\Rain\Database\Collection;

use Cms\Classes\ComponentBase;

use App\Models\YouTubeVideo;

final class YouTubeVideosList extends ComponentBase
{
    /**
     * EloquentORM collection of videos model.
     *
     * @property \October\Rain\Database\Collection
     */
    public Collection $videos;

    /**
     * @inheritDoc
     */
    public function componentDetails() : array
    {
        return [
            'name' => 'YouTube video list',
            'description' => 'Component that renders a custom list with last four YouTube videos.'
        ];
    }

    /**
     * @inheritDoc
     */
    public function onRun() : void
    {
        $this->videos = YouTubeVideo::orderBy('upload_date', 'desc')
            ->limit(4)
            ->get();
    }
}
