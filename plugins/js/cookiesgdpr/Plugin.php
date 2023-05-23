<?php namespace JS\CookiesGdpr;

use Backend;
use Illuminate\Cookie\Middleware\EncryptCookies;
use JS\CookiesGdpr\Models\Cookie;
use System\Classes\PluginBase;

/**
 * GDPR Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'GDPR',
            'description' => 'Simple GDPR Manager',
            'author'      => 'Josep Salvà',
            'icon'        => 'icon-legal'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'JS\CookiesGdpr\Components\CookiesAdvice'      => 'cookiesAdvice',
            'JS\CookiesGdpr\Components\CookiePolicy'       => 'cookiePolicy',
            'JS\CookiesGdpr\Components\LegalTerms'         => 'legalTerms',
            'JS\CookiesGdpr\Components\PrivacityPolicy'    => 'privacityPolicy',
            // 'JS\CookiesGdpr\Components\TermsAndConditions' => 'termsAndConditions'
        ];
    }

    public function registerSettings()
    {
        return [
            'cookieadvicesettings' => [
                'label' => 'Cookie Advice settings',
                'description' => 'Manage cookie advice details',
                'category' => 'Web',
                'icon' => 'icon-cog',
                'class' => 'JS\CookiesGdpr\Models\CookieAdviceSettings',
                'url' => Backend::url('js/cookiesgdpr/cookieadvicesettings/update'),
                'order' => 501,
                'keywords' => 'security location',
            ]
        ];
    }

    public function boot()
    {
        $this->app->resolving(EncryptCookies::class, function ($object) {
            $cookies = Cookie::active()->pluck('name')->toArray();
            $cookies[] = 'gdprcookienotice';
            $object->disableFor($cookies);
        });
    }

}
