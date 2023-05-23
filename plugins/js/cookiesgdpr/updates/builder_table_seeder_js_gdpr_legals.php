<?php namespace JS\CookiesGdpr\Updates;

use Seeder;
use JS\CookiesGdpr\Models\Legal;

class BuilderTableSeederRwGdprLegals extends Seeder
{
    public function run()
    {
        $legal = Legal::create([
            'legal_terms'           => 'Aviso Legal',
            'cookies_policy'        => 'Política de Cookies',
            'privacity_policy'      => 'Política de Privacidad',
            'terms_and_conditions'  => 'Terminos y Cpndiciones'
        ]);
    }

}
