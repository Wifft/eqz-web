<?php
namespace App;

use System\Classes\AppBase;

use App\Components\YouTubeVideosList;

use App\Console\ImportYouTubeVideos;
use App\Jobs\YouTubeVideosImport;

final class Provider extends AppBase
{
    /**
     * @inheritDoc
     */
    public function registerComponents() : array
    {
        return [
            YouTubeVideosList::class => 'youtubeVideosList'
        ];
    }

    /**
     * @inheritDoc
     */
    public function register() : void
    {
        $this->registerConsoleCommand('eqz:import_youtube_videos', ImportYouTubeVideos::class);
    }

    /**
     * @inheritDoc
     */
    public function registerSchedule($schedule) : void
    {
        $schedule->job(YouTubeVideosImport::class)->everySixHours();
    }
}
