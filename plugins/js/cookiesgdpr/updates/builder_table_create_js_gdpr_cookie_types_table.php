<?php namespace JS\CookiesGdpr\Updates;

use DB;
use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRwGdprCookieTypesTable extends Migration
{
    public function up()
    {
        Schema::create('js_gdpr_cookie_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Db::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('js_gdpr_cookie_types');
        Db::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
