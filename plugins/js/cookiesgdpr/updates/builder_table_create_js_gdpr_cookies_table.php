<?php namespace JS\CookiesGdpr\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRwGdprCookiesTable extends Migration
{
    public function up()
    {
        Schema::create('js_gdpr_cookies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();

            $table->string('duration', 255)->nullable();
            $table->string('domain', 255)->nullable();

            $table->boolean('is_active')->default(0);

            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('js_gdpr_cookie_types');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('js_gdpr_cookies');
    }
}
