<?php namespace JS\CookiesGdpr\Components;

use System\Classes\CombineAssets;
use Cms\Classes\ComponentBase;
use JS\CookiesGdpr\Models\Cookie;
use JS\CookiesGdpr\Models\CookieAdviceSettings as AdviceModel;

class CookiesAdvice extends ComponentBase
{

    /**
     * A collection of performance cookies to display
     *
     * @var Collection
     */
    public $performance_cookies;

    /**
     * A collection of analytics cookies to display
     *
     * @var Collection
     */
    public $analytics_cookies;

    /**
     * A collection of marketing cookies to display
     *
     * @var Collection
     */
    public $marketing_cookies;


    public function componentDetails()
    {
        return [
            'name'        => 'CookiesAdvice Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['consent'] = [
            'analytics' => $this->isAnalyticsAccepted(),
            'marketing' => $this->isMarketingAccepted(),
            'performance' => $this->isPerformanceAccepted()
        ];

        $consent = json_decode(\Cookie::get('gdprcookienotice'));

        if ($consent) {
            $this->clearCookieTypes($consent);
        } else {
            $this->clearCookies();
        }

        $this->addJs('assets/js/gdpr-rw-cookie-notice.js');
        $this->addJs('assets/js/cookies_event_listeners.js');

        $this->addCss('assets/css/gdpr-rw-cookie-notice.min.css');
        $this->addCss('assets/css/gdpr-rw-cookie-notice-theme-styles.css');

        $this->prepareVars();

    }

    protected function prepareVars()
    {
        $this->performance_cookies = $this->page['performance_cookies'] = $this->getPerformanceCookies();
        $this->analytics_cookies = $this->page['analytics_cookies'] = $this->getAnalitycsCookies();
        $this->marketing_cookies = $this->page['marketing_cookies'] = $this->getMarketingCookies();

        $this->cookies_advice_text = $this->page['cookies_advice_text'] = $this->getCookiesAdviceText();

        $this->adviceSettings = $this->page['adviceSettings'] = AdviceModel::instance();
        $this->adviceDomain = $this->page['adviceDomain'] = $this->getConfigDomain();
    }

    protected function getConfigDomain()
    {
        $config = AdviceModel::instance();
        $domain = $config->domain;

        if (!$config->domain || !filter_var($config->domain, FILTER_VALIDATE_URL)) {
            $domain = env('APP_URL');
        }

        $domain = trim($domain, '/');

        // If not have http:// or https:// then prepend it
        if (!preg_match('#^http(s)?://#', $domain)) {
            $domain = 'http://' . $domain;
        }

        $domain = parse_url($domain);

        // Remove www.
        $domain = preg_replace('/^www\./', '', $domain['host']);

        return '.' . $domain;
    }


    protected function getPerformanceCookies()
    {
        return Cookie::active()->where('type_id', 1)->pluck('name');

    }

    protected function getAnalitycsCookies()
    {
        return Cookie::active()->where('type_id', 2)->pluck('name');

    }

    protected function getMarketingCookies()
    {
        return Cookie::active()->where('type_id', 3)->pluck('name');

    }

    protected function getCookiesAdviceText()
    {

        $current_lang = $this->property('locale');

        $cookies_advice_text = AdviceModel::instance()->toArray();

        $cookies_advice_text_json = json_encode($cookies_advice_text, JSON_PRETTY_PRINT, JSON_HEX_QUOT);

        return $cookies_advice_text_json;
    }

    public function clearCookies()
    {
        $cookies = Cookie::active()->pluck('name')->toArray();

        foreach ($cookies as $cookie) {
            if (\Cookie::has($cookie) && $cookie != 'october_session' && $cookie != 'admin_auth') {
                \Cookie::queue(\Cookie::forget($cookie));
            }
        }
    }

    public function clearCookieTypes($consent)
    {
        if(!$consent->performance) {
            $this->getPerformanceCookies()->map(function ($cookie) use($consent) {
                if (\Cookie::has($cookie) && $cookie != 'october_session' && $cookie != 'admin_auth') {
                    \Cookie::queue(\Cookie::forget($cookie));
                }
            });
        }

        if(!$consent->analytics) {
            $this->getAnalitycsCookies()->map(function ($cookie) use($consent) {
                if (\Cookie::has($cookie) && $cookie != 'october_session' && $cookie != 'admin_auth') {
                    \Cookie::queue(\Cookie::forget($cookie));
                }
            });
        }

        if(!$consent->marketing) {
            $this->getMarketingCookies()->map(function ($cookie) use($consent) {
                if (\Cookie::has($cookie) && $cookie != 'october_session' && $cookie != 'admin_auth') {
                    \Cookie::queue(\Cookie::forget($cookie));
                }
            });
        }
    }

    public function isMarketingAccepted() : bool
    {
        $consent = json_decode(\Cookie::get('gdprcookienotice'));

        if (!$consent) {
            return false;
        }

        return $consent->marketing;
    }

    public function isAnalyticsAccepted() : bool
    {
        $consent = json_decode(\Cookie::get('gdprcookienotice'));

        if (!$consent) {
            return false;
        }

        return $consent->analytics;
    }

    public function isPerformanceAccepted() : bool
    {
        $consent = json_decode(\Cookie::get('gdprcookienotice'));

        if (!$consent) {
            return false;
        }

        return $consent->performance;
    }

}
