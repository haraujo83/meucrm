const mix = require('laravel-mix');

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

 mix
 //.sass('resources/sass/style.scss', 'public/css/style.css')
      //script admin-lte
      .scripts('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js')
      //.scripts('node_modules/admin-lte/plugins/chart.js/Chart.min.js', 'public/js/Chart.min.js')
      .scripts('node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/js/jquery.min.js')
      .scripts('node_modules/admin-lte/plugins/sweetalert2/sweetalert2.all.min.js', 'public/js/sweetalert2.all.min.js')   
 
      .scripts('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js/adminlte.min.js')
      //css admin-lte
      .css('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css/adminlte.min.css')
      .css('node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css', 'public/css/all.min.css');