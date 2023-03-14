<?php
use Illuminate\Http\Response as HttpResponse;

use Illuminate\Support\Facades\Response;

$appUrl = env('APP_URL');

Route::get(
    'robots.txt',
    fn  () : HttpResponse => Response::make(
        <<<EOL
        User-agent: *
        Disallow: /oc-admin
        Host: $appUrl
        Sitemap: $appUrl/sitemap.xml
        EOL
    )
        ->header("Content-Type", "text/plain")
);

Route::get(
    'humans.txt',
    fn  () : HttpResponse => Response::make(
        <<<EOL
        /* TEAM */
        Developer: Wifft.
        Site: https://www.josepsalva.name
        Twitter: https://twitter.com/wifft_
        Instagram: https://instagram.com/wifft/
        Twitch: https://twitch.tv/wifft
        Location: Palma, Illes Balears, Spain.

        Graphic designer: Klozz.
        Twitter: https://twitter.com/klozzvsl
        Location: Cordoba, Spain.

        /* SITE */
        Last update: 12/03/2023.
        Standards: HTML 5.3, CSS 3, PHP 8.1.
        Components: Tailwind 3.
        Software: OctoberCMS 3.2.21.
        EOL
    )
        ->header("Content-Type", "text/plain")
);
