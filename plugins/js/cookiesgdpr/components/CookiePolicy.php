<?php namespace JS\CookiesGdpr\Components;

use Lang;
use System\Classes\CombineAssets;
use Cms\Classes\ComponentBase;
use JS\CookiesGdpr\Models\Legal;
use JS\CookiesGdpr\Models\Cookie;
use JS\CookiesGdpr\Models\CookieType;

class CookiePolicy extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Cookie Policy Page Component',
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

        $cookies_text = Legal::first();

        $cookies_list = $this->generateCookiesTable();
        $cookies_types_list = $this->generateCookiesTypesList();

        $legal = $this->parseLegal($cookies_list, $cookies_types_list, $cookies_text);

        $this->page['legal'] = $this->legal = $legal;
    }

    public function generateCookiesTable() {

        $cookies_list = Cookie::all();
        $output = "<table class='rw-cookies-table'>";

        $output .= "<tr>";
        $output .= "<th>".Lang::get('js.cookiesgdpr::lang.fields.cookies.name')."</th>";
        $output .= "<th>".Lang::get('js.cookiesgdpr::lang.fields.cookies.cookie_type')."</th>";
        $output .= "<th>".Lang::get('js.cookiesgdpr::lang.fields.cookies.domain')."</th>";
        $output .= "<th>".Lang::get('js.cookiesgdpr::lang.fields.cookies.description')."</th>";
        $output .= "<th>".Lang::get('js.cookiesgdpr::lang.fields.cookies.duration')."</th>";
        $output .= "</tr>";

        foreach ($cookies_list as $cookie) {
            $output .= "<tr>";
            $output .= "<td>{$cookie->name}</td>";
            $output .= "<td>{$cookie->type->name}</td>";
            $output .= "<td>{$cookie->domain}</td>";
            $output .= "<td>{$cookie->description}</td>";
            $output .= "<td>{$cookie->duration}</td>";
            $output .= "</tr>";
        }

        $output .= "</table>";

        return $output;
    }

    public function generateCookiesTypesList() {

        $cookies_types_list = CookieType::all();
        $output = "<table class='rw-cookies-type-table'>";

        $output .= "<tr>";
        $output .= "<th>".Lang::get('js.cookiesgdpr::lang.fields.cookies_types.name')."</th>";
        $output .= "<th>".Lang::get('js.cookiesgdpr::lang.fields.cookies_types.description')."</th>";
        $output .= "</tr>";

        foreach ($cookies_types_list as $type) {
            $output .= "<tr>";
            $output .= "<td>{$type->name}</td>";
            $output .= "<td>{$type->description}</td>";
            $output .= "</tr>";
        }

        $output .= "</table>";

        return $output;

    }

    public function parseLegal($cookies_list, $cookies_types_list, $cookies_text) {

        $vars = array(
            '{$cookies_table}'        => $cookies_list,
            '{$cookies_types_list}'   => $cookies_types_list
        );

        $legal = strtr($cookies_text->cookies_policy, $vars);

        return $legal;

    }
}
