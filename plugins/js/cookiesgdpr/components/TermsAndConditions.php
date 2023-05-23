<?php namespace JS\CookiesGdpr\Components;

use Cms\Classes\ComponentBase;
use JS\CookiesGdpr\Models\Legal;

/**
 * TermsAndConditions Component
 */
class TermsAndConditions extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Terms And Conditions Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        $legal = Legal::first();
        $this->page['legal'] = $this->legal = $legal;
    }
}
