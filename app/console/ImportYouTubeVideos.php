<?php
namespace App\Console;

use Illuminate\Console\Command;

use App\Models\YouTubeVideo;

use Carbon\Carbon;

use Madcoda\Youtube\Facades\Youtube;

final class ImportYouTubeVideos extends Command
{
    /**
     * @inheritDoc
     */
    protected $name = 'eqz:import_youtube_videos';

    /**
     * @inheritDoc
     */
    protected $description = 'Command for last youtube videos import';

    /**
     * @inheritDoc
     */
    public function handle() : void
    {
        /** @var \Madcoda\Youtube */
        $videos = Youtube::searchChannelVideos([], 'UCGrgzxQlOcgWJXskQR7yhqQ', 4, 'date');

        /** @var object $video */
        foreach ($videos as $video) {
            $videoInfo = Youtube::getVideoInfo($video->id->videoId);
            if ($videoInfo->status->privacyStatus === 'public') {
                YouTubeVideo::firstOrCreate(
                    [
                        'video_id' => $video->id->videoId
                    ],
                    [
                        'title' => $video->snippet->title,
                        'video_thumb_url' => $video->snippet->thumbnails->high->url,
                        'upload_date' => Carbon::parse($video->snippet->publishedAt)->toDateTimeString()
                    ]
                );
            }
        }
    }
}
