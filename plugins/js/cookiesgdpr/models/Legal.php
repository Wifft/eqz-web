<?php namespace JS\CookiesGdpr\Models;

use Model;

/**
 * Model
 */
class Legal extends Model
{
    public $implement = [
        '@RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
        'legal_terms',
        'cookies_policy',
        'privacity_policy',
        'terms_and_conditions'
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'js_gdpr_legals';

}
