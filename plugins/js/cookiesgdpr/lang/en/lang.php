<?php return [
    'plugin' => [
        'name'          => 'GDPR',
        'description'   => ''
    ],
    'menu' => [
        'gdpr'          => 'GDPR',
        'legal'         => 'Legal Terms'
    ],
    'permissions' => [
        'js_manage_cookies'         => 'Manage Cookies',
        'js_manage_cookies_types'   => 'Manage Cookies Types',
        'js_manage_cookie_advise'   => 'Manage Cookies Advice',
        'js_manage_legal_pages'     => 'Manage Legal Pages',
        'js_manage_settings'        => 'Cookie Advise Settings',
    ],
    'pages' => [
        'cookies'           => 'Cookies',
        'cookies_types'     => 'Cookies Types',
        'cookies_advise'    => 'Cookies Advise',
        'legal'             => 'Páginas Legales'
    ],
    'tabs' => [
        'legal_advise'          => 'Legal Advise',
        'cookies_policy'        => 'Cookies policy',
        'privacy_policy'        => 'Privacy Policy',
        'terms_and_conditions'  => 'Terms & Conditions',
        'texts'                 => 'Texts',
        'colors'                => 'Colors',
        'params' => 'Parameters',
    ],
    'fields' => [
        'cookies_advise' => [
            'description'               => 'Description',
            'readmore'                  => 'Readmore button Text',
            'settings'                  => 'Setting link text',
            'accept'                    => 'Accept button text',
            'statement'                 => 'Statement',
            'save'                      => 'Save',
            'always_on'                 => 'Text "Always On"',
            'cookie_essential_title'    => 'Title Essential Cookies',
            'cookie_essential_desc'     => 'Description Essential Cookies',
            'cookie_performance_title'  => 'Title Performance Cookies',
            'cookie_performance_desc'   => 'Description Performance Cookies',
            'cookie_analytics_title'    => 'Title Analytics Cookies',
            'cookie_analytics_desc'     => 'Description Analytics Cookies',
            'cookie_marketing_title'    => 'Title Marketing Cookies',
            'cookie_marketing_desc'     => 'Description Marketing Cookies',
        ],
        'cookies' => [
            'description'   => 'Description',
            'name'          => 'Name',
            'cookie_type'   => 'Cookie Type',
            'domain'        => 'Domain',
            'duration'      => 'Duration'
        ],
        'cookies_types' => [
            'description'   => 'Description',
            'name'          => 'Name'
        ],
        'legal' => [
            'legal_advise'          => 'Legal Advise',
            'cookies_policy'        => 'Cookies policy',
            'privacy_policy'        => 'Privacy Policy',
            'terms_and_conditions'  => 'Terms & Conditions'
        ],
        'color_primary'             => 'Main color',
        'color_background'          => 'Background color',
        'color_text'                => 'Text color',
        'color_link'                => 'Link color',
        'color_modal_title'         => 'Modal title color',
        'color_modal_text'          => 'Modal text color',
        'color_modal_footer'        => 'Modal footer color',
        'color_modal_icon'          => 'Modal icon color',
        'domain' => 'Domain',
        'domain_description' => 'Gets .env url by default',
        'cookies_page_desc' => 'Set on /cookies by default on every lang',
        'timeout' => 'Showing delay (ms.)',
        'expiration' => 'Cookie expiration (min.)',
    ]
];
