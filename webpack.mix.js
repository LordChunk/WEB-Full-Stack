const mix = require('laravel-mix');
const path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
  .vue({ version: 3 })
  .alias({
    '@': 'resources/js',
    'ziggy': path.resolve('vendor/tightenco/ziggy/dist/vue'),
  })
  .sass('resources/css/app.scss', 'public/css');
