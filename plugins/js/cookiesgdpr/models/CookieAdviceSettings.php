<?php namespace JS\Cookiesgdpr\Models;

use Model;

/**
 * CookieAdviceSettings Model
 */
class CookieAdviceSettings extends Model
{
    public $implement = [
        'System.Behaviors.SettingsModel',
        '@RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
        'cookies',
        'description',
        'readmore',
        'settings',
        'accept',
        'reject',
        'statement',
        'save',
        'always_on',
        'cookie_essential_title',
        'cookie_essential_desc',
        'cookie_performance_title',
        'cookie_performance_desc',
        'cookie_analytics_title',
        'cookie_analytics_desc',
        'cookie_marketing_title',
        'cookie_marketing_desc',
    ];

    // A unique code
    public $settingsCode = 'js_cookiesgdpr_config';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
