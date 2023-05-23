<?php namespace JS\CookiesGdpr\Updates;

use October\Rain\Database\Updates\Seeder;
use JS\Cookiesgdpr\Models\CookieAdviceSettings;

class BuilderTableSeedRwGdprCookieAdviceTextsTable extends Seeder
{

    public function run()
    {
        $settings = CookieAdviceSettings::instance();

        // TEXTOS
        $settings->description = 'Usamos cookies para ofrecerle una mejor experiencia de navegación, personalizar el contenido y los anuncios, proporcionar funciones de redes sociales y analizar nuestro tráfico. Puedes leer más sobre cómo usamos las cookies y cómo puede controlarlas haciendo clic en Configuración de cookies.';
        $settings->readmore = 'Leer más';
        $settings->settings = 'Configuración de cookies';
        $settings->accept = 'Aceptar cookies';
        $settings->reject = 'Rechazar';
        $settings->statement = 'Nuestro aviso de cookies';
        $settings->save = 'Guardar configuración';
        $settings->always_on = 'Siempre activas';
        $settings->cookie_essential_title = 'Cookies necesarias';
        $settings->cookie_essential_desc = 'Estas cookies son necesarias para que la página web funcione correctamente.';
        $settings->cookie_performance_title = 'Cookies de rendimiento';
        $settings->cookie_performance_desc = 'Estas cookies son usadas para mejorar el rendimiento de la página web pero no son esenciales. Por ejemplo el idioma predefinido del usuario';
        $settings->cookie_analytics_title = 'Cookies de analítica';
        $settings->cookie_analytics_desc = 'Estas cookies nos ayudan a medir cómo los usuarios interactuan con el contenido de la web, lo que nos ayuda a personalizar las páginas web y aplicaciones con el proposito de mejorar la experiencia de usuario';
        $settings->cookie_marketing_title = 'Cookies de marketing';
        $settings->cookie_marketing_desc = 'Usamos cookies para ofrecerle una mejor experiencia de navegación, personalizar el contenido y los anuncios, proporcionar funciones de redes sociales y analizar nuestro tráfico. Puedes leer más sobre cómo usamos las cookies y cómo puede controlarlas haciendo clic en Configuración de cookies.';

        // COLORES
        $settings->color_primary = '#8dbed5';
        $settings->color_background = '#333333';
        $settings->color_text = '#ffffff';
        $settings->color_link = '#ffffff';
        $settings->color_modal_bg = '#000000';
        $settings->color_modal_title = '#000000';
        $settings->color_modal_text = '#000000';
        $settings->color_modal_footer = '#ffffff';
        $settings->color_modal_icon = '#bdbdbd';

        $settings->save();
    }

}
