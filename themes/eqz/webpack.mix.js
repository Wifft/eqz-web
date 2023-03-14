const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss');

mix.setPublicPath('./assets/')
mix.setPublicPath('./assets/')

mix.disableSuccessNotifications();

mix.js('assets/js/bundle/index.js', 'js/main.js')
    .sass('assets/scss/app.scss', 'css')
    .options(
        {
            processCssUrls: false,
            postCss: [
                tailwindcss('./tailwind.config.js')
            ]
        }
    );

mix.browserSync(
    {
        proxy: 'eqz.test',
        files: [
            './**/*.htm',
            './**/*.js',
            './**/*.scss',
            './../../plugins/**/*.htm'
        ]
    }
);
