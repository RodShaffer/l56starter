let mix = require('laravel-mix');

mix.setPublicPath('public_html');

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

mix.js('resources/assets/js/admin/admin.js', 'js/admin')
    .sass('resources/assets/sass/admin/admin.scss', 'css/admin');
