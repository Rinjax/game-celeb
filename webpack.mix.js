let mix = require('laravel-mix');

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

mix.setResourceRoot('/game-celeb/');

mix.setPublicPath('./src/Public');



mix.sass('./src/Resources/Assets/sass/app.scss', 'css/app.css')

    .js('./src/Resources/Assets/js/app.js', 'js/app.js')

    .version();
