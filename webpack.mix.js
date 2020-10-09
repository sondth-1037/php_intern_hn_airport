const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/web.js', 'public/js')
    .js('resources/js/agency.js', 'public/js')
    .js('resources/js/host/hostDetail.js', 'public/js/host')
    .js('resources/js/host/host.js', 'public/js/host')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/notification.js', 'public/js')
    .sass('resources/sass/web.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/agency.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css');
