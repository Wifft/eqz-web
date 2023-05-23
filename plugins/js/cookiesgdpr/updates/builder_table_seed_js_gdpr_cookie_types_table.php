<?php namespace JS\CookiesGdpr\Updates;

use Carbon\Carbon;
use JS\CookiesGdpr\Models\CookieType;
use October\Rain\Database\Updates\Seeder;

class BuilderTableSeedRwGdprCookieTypesTable extends Seeder
{

    public function run()
    {
        CookieType::create([
            'name' => 'Performance',
            'description' => 'performance cookies'
        ]);

        CookieType::create([
            'name' => 'Analytics',
            'description' => 'analytics cookies'
        ]);

        CookieType::create([
            'name' => 'Marketing',
            'description' => 'marketing cookies'
        ]);
    }

}
