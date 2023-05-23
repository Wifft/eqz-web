<?php namespace JS\CookiesGdpr\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRwGdprCookieAdviceTextsTable extends Migration
{
    public function up()
    {
        Schema::create('js_gdpr_cookie_advice_texts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->text('description')->nullable();

            $table->string('readmore', 255)->nullable();
            $table->string('settings', 255)->nullable();
            $table->string('accept', 255)->nullable();
            $table->string('statement', 255)->nullable();
            $table->string('save', 255)->nullable();
            $table->string('reject', 255)->nullable();
            $table->string('always_on', 255)->nullable();

            $table->text('cookie_essential_title')->nullable();
            $table->text('cookie_essential_desc')->nullable();

            $table->text('cookie_performance_title')->nullable();
            $table->text('cookie_performance_desc')->nullable();

            $table->text('cookie_analytics_title')->nullable();
            $table->text('cookie_analytics_desc')->nullable();

            $table->text('cookie_marketing_title')->nullable();
            $table->text('cookie_marketing_desc')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('js_gdpr_cookie_advice_texts');
    }
}
