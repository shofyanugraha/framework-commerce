let mix = require('laravel-mix');
var path = require('path');

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

mix.sass('resources/assets/scss/theme/default/app.scss', 'public/themes/default/css').version().sourceMaps();

mix.scripts([
   'node_modules/jquery/dist/jquery.min.js', 
   'node_modules/bootstrap/dist/js/bootstrap.min.js'
 ], 'public/js/app.js').version().sourceMaps();

mix.browserSync({
    proxy: 'calcio.dev'
});