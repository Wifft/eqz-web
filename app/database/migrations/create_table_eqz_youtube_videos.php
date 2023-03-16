<?php
use Illuminate\Support\Facades\Schema;

use October\Rain\Database\Schema\Blueprint;

use October\Rain\Database\Updates\Migration;

return new class extends Migration
{
    /**
     * Name of the target table.
     *
     * @property string
     *
     * @static
     */
    private static string $tableName = 'eqz_youtube_videos';

    /**
     * @inheritDoc
     */
    public function up() : void
    {
        Schema::create(
            self::$tableName,
            function (Blueprint $table) : void {
                $table->engine = 'InnoDB';
                $table->id();
                $table->string('title', 255);
                $table->string('video_id', 50);
                $table->string('video_thumb_url', 255);
                $table->dateTime('upload_date');
                $table->timestamps();
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function down() : void
    {
        Schema::dropIfExists(self::$tableName);
    }
};
