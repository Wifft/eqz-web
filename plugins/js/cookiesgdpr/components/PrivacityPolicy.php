<?php namespace JS\CookiesGdpr\Components;

use System\Classes\CombineAssets;
use Cms\Classes\ComponentBase;
use JS\CookiesGdpr\Models\Legal;

class PrivacityPolicy extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Privacity Policy Page Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {

        $this->addCss(CombineAssets::combine([
            'assets/css/gdpr-rw-cookies-table.css'
        ], base_path() . $this->assetPath));

        $legal = Legal::first();
        $this->page['legal'] = $this->legal = $legal;
    }
}
