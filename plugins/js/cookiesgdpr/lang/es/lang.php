<?php return [
    'plugin' => [
        'name'          => 'GDPR',
        'description'   => ''
    ],
    'menu' => [
        'gdpr'          => 'GDPR',
        'legal'         => 'Terminos Legales'
    ],
    'permissions' => [
        'js_manage_cookies'         => 'Gestionar Cookies',
        'js_manage_cookies_types'   => 'Gestionar Tipos de Cookies',
        'js_manage_cookie_advise'   => 'Gestionar Aviso de Cookies',
        'js_manage_legal_pages'     => 'Gestionar Páginas Legales',
        'js_manage_settings'        => 'Configuración aviso de cookies',
    ],
    'pages' => [
        'cookies'           => 'Cookies',
        'cookies_types'     => 'Tipos de Cookies',
        'cookies_advise'    => 'Aviso de Cookies',
        'legal'             => 'Páginas Legales'
    ],
    'tabs' => [
        'legal_advise' => 'Aviso Legal',
        'cookies_policy' => 'Política de Cookies',
        'privacy_policy' => 'Política de Privacidad',
        'terms_and_conditions' => 'Términos y condiciones',
        'texts' => 'Textos',
        'colors' => 'Colores',
        'params' => 'Parámetros',
    ],
    'fields' => [
        'cookies_advise' => [
            'description'               => 'Descripción',
            'readmore'                  => 'Texto Botón "Leer Más"',
            'settings'                  => 'Texto Botón "Configuración"',
            'accept'                    => 'Texto Botón "Aceptar cookies"',
            'statement'                 => 'Texto Botón "Nuestro aviso de cookies"',
            'save'                      => 'Texto Botón "Guardar configuración"',
            'always_on'                 => 'Texto "Siempre activas"',
            'cookie_essential_title'    => 'Título Cookies de Esenciales',
            'cookie_essential_desc'     => 'Descripción Cookies de Esenciales',
            'cookie_performance_title'  => 'Título Cookies de Rendimiento',
            'cookie_performance_desc'   => 'Descripción Cookies de Rendimiento',
            'cookie_analytics_title'    => 'Título Cookies de Analíticas',
            'cookie_analytics_desc'     => 'Descripción Cookies de Analíticas',
            'cookie_marketing_title'    => 'Título Cookies de Marketing',
            'cookie_marketing_desc'     => 'Descripción Cookies de Marketing',
        ],
        'cookies' => [
            'description'   => 'Descripción',
            'name'          => 'Nombre',
            'cookie_type'   => 'Tipo de Cookie',
            'domain'        => 'Dominio',
            'duration'      => 'Duración'
        ],
        'cookies_types' => [
            'description'   => 'Descripción',
            'name'          => 'Nombre'
        ],
        'legal' => [
            'legal_advise' => 'Aviso Legal',
            'cookies_policy' => 'Política de Cookies',
            'privacy_policy' => 'Política de Privacidad',
            'terms_and_conditions' => 'Términos y condiciones'
        ],
        'color_primary'             => 'Color principal',
        'color_background'          => 'Color fondo',
        'color_text'                => 'Color texto',
        'color_link'                => 'Color enlaces',
        'color_modal_title'         => 'Color título modal',
        'color_modal_text'          => 'Color texto modal',
        'color_modal_footer'        => 'Color footer modal',
        'color_modal_icon'          => 'Color icono modal',
        'domain' => 'Dominio',
        'domain_description' => 'Por defecto coge el del .env',
        'cookies_page_desc' => 'Por defecto /cookies en todos los idiomas',
        'timeout' => 'Delay de aparición (ms.)',
        'expiration' => 'Caducidad de la cookie (min.)',
    ]
];
