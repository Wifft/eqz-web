<?php namespace JS\CookiesGdpr\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRwGdprLegals extends Migration
{
    public function up()
    {
        Schema::create('js_gdpr_legals', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('legal_terms')->nullable();
            $table->text('cookies_policy')->nullable();
            $table->text('privacity_policy')->nullable();
            $table->text('terms_and_conditions')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('js_gdpr_legals');
    }
}
