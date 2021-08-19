let mix = require('laravel-mix');

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
    .scripts('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js')
    .scripts('node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/js/jquery.min.js')
    .scripts('node_modules/admin-lte/plugins/sweetalert2/sweetalert2.all.min.js', 'public/js/sweetalert2.all.min.js')
    .scripts('node_modules/select2/dist/js/select2.full.min.js', 'public/js/select2.full.min.js')
    .scripts('node_modules/select2/dist/js/i18n/pt-BR.js', 'public/js/select2/pt-BR.js')
    .scripts('node_modules/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', 'public/js/tempusdominus-bootstrap-4.min.js')
    .scripts('node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js', 'public/js/daterangepicker.js')

    .scripts('node_modules/admin-lte/plugins/moment/moment.min.js', 'public/js/moment.min.js')
    .scripts('node_modules/admin-lte/plugins/moment/locales.min.js', 'public/js/locales.min.js')
    .scripts('node_modules/admin-lte/plugins/moment/locale/pt-br.js', 'public/js/moment/pt-br.js')

    .scripts('node_modules/admin-lte/plugins/inputmask/jquery.inputmask.min.js', 'public/js/jquery.inputmask.min.js')

    .scripts('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js/adminlte.min.js')

    .scripts('node_modules/@popperjs/core/dist/umd/popper.min.js', 'public/js/popper.min.js')
    .scripts('node_modules/tippy.js/dist/tippy-bundle.umd.min.js', 'public/js/tippy-bundle.umd.min.js')
    .scripts('node_modules/sortablejs/Sortable.min.js', 'public/js/Sortable.min.js')
    .scripts('node_modules/jquery-sortablejs/jquery-sortable.js', 'public/js/jquery-sortable.js')

    .scripts('resources/js/leads.js', 'public/js/leads.js')

    .css('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css/adminlte.min.css')
    .css('node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css', 'public/css/fontawesome-free.min.css')

    .css('node_modules/admin-lte/plugins/daterangepicker/daterangepicker.css', 'public/css/daterangepicker.css')
    .css('node_modules/select2/dist/css/select2.min.css', 'public/css/select2.min.css')
    .css('node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css', 'public/css/select2-bootstrap.min.css')
    .css('node_modules/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', 'public/css/tempusdominus-bootstrap-4.min.css')

    //.css('resources/css/app.css', 'public/ccs/app.css')
;
