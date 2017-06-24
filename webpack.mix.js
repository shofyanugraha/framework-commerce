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

mix.less('resources/assets/less/app.less', 'public/css').version().sourceMaps()
   .copy('node_modules/sweetalert/dist/sweetalert.css', 'public/css/sweetalert.css');

mix.scripts([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/axios/dist/axios.js',
    'node_modules/sweetalert/dist/sweetalert.min.js',
    'node_modules/jquery-price-format/jquery.priceformat.min.js',
    'node_modules/magnify/dist/js/jquery.magnify.js',
    'node_modules/jquery-validation/dist/jquery.validate.min.js',
    'node_modules/js-storage/js.storage.min.js',
    'public/js/jquery.downCount.js',
    'public/js/app.js',
    'node_modules/form-serializer/dist/jquery.serialize-object.min.js'], 'public/js/customize.js').sourceMaps();