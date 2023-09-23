<?php
namespace JS\Contact\Updates;

use October\Rain\Database\Schema\Blueprint;

use October\Rain\Database\Updates\Migration;

use October\Rain\Support\Facades\Schema;

class CreatedTableJsContactRequests extends Migration
{
    /**
     * Migration table name.
     *
     * @property string
     *
     * @static
     */
    private static string $tableName = "js_contact_requests";

    /**
     * @inheritDoc
     */
    public function up() : void
    {
        Schema::create(
            self::$tableName,
            function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('email', 255);
                $table->text('msg', 65535);
                $table->timestamps();
                $table->softDeletes();
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
}
