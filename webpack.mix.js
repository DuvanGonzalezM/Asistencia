const { mix } = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .js('resources/assets/js/app-landing.js', 'public/js/app-landing.js')
//    .sourceMaps()
//    .combine([
//        'resources/assets/css/bootstrap.min.css',
//        'resources/assets/css/font-awesome.min.css',
//        'resources/assets/css/ionicons.min.css',
//        'node_modules/admin-lte/dist/css/AdminLTE.min.css',
//        'node_modules/admin-lte/dist/css/skins/_all-skins.css',
//        'node_modules/icheck/skins/square/blue.css'
//    ], 'public/css/all.css')
//    .combine([
//        'resources/assets/css/bootstrap.min.css',
//        'resources/assets/css/pratt_landing.min.css'
//    ], 'public/css/all-landing.css')
//    // PACKAGE (ADMINLTE-LARAVEL) RESOURCES
//    .copy('resources/assets/img/*.*','public/img/')
//    //VENDOR RESOURCES
//    .copy('node_modules/font-awesome/fonts/*.*','public/fonts/')
//    .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')
//    .copy('node_modules/bootstrap/fonts/*.*','public/fonts/')
//    .copy('node_modules/admin-lte/dist/css/skins/*.*','public/css/skins')
//    .copy('node_modules/admin-lte/dist/img','public/img')
//    .copy('node_modules/admin-lte/plugins','public/plugins')
//    .copy('node_modules/icheck/skins/square/blue.png','public/css')
//    .copy('node_modules/icheck/skins/square/blue@2x.png','public/css')

// if (mix.config.inProduction) {
//   mix.version();
//   mix.minify();
// }

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/app-landing.js', 'public/js/app-landing.js')
   .sourceMaps()
   .combine([
       'resources/assets/css/bootstrap.min.css',
       'resources/assets/css/font-awesome.min.css',
       'node_modules/admin-lte/dist/css/AdminLTE.min.css',
       'node_modules/admin-lte/dist/css/skins/_all-skins.css',
       'node_modules/icheck/skins/square/blue.css'
   ], 'public/css/all.css')
   .combine([
       'resources/assets/css/bootstrap.min.css',
       'resources/assets/css/pratt_landing.min.css'
   ], 'public/css/all-landing.css')
   .combine([
        'node_modules/datatables.net-dt/css/jquery.dataTables.min.css',,
        'node_modules/datatables.net-select-dt/css/select.dataTables.min.css',
        'node_modules/datatables.net-rowreorder-dt/css/rowReorder.dataTables.min.css',
        'node_modules/datatables.net-rowgroup-dt/css/rowGroup.dataTables.min.css',
        'node_modules/datatables.net-responsive-dt/css/responsive.dataTables.min.css',
        'node_modules/datatables.net-keytable-dt/css/keyTable.dataTables.min.css',
        'node_modules/datatables.net-fixedheader-dt/css/fixedHeader.dataTables.min.css',
        'node_modules/datatables.net-fixedcolumns-dt/css/fixedColumns.dataTables.min.css',
        'node_modules/datatables.net-colreorder-dt/css/colReorder.dataTables.min.css',
        'node_modules/datatables.net-buttons-dt/css/buttons.dataTables.min.css',
        'node_modules/datatables.net-autofill-dt/css/autoFill.dataTables.min.css'
    ], 'public/css/datatable-depen.css')
   .scripts([
        'node_modules/datatables.net/js/jquery.dataTables.min.js',
        'node_modules/datatables.net-autofill/js/dataTables.autoFill.js',
        'node_modules/datatables.net-bs/js/dataTables.bootstrap.min.js',
        'node_modules/datatables.net-dt/js/dataTables.dataTables.min.js',
        'node_modules/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js',
        'node_modules/datatables.net-rowgroup/js/dataTables.rowGroup.min.js',
        'node_modules/datatables.net-scroller/js/dataTables.scroller.min.js',
        'node_modules/datatables.net-buttons/js/dataTables.buttons.min.js',
        'node_modules/datatables.net-buttons/js/buttons.html5.min.js',
        'node_modules/datatables.net-buttons/js/buttons.flash.min.js',
        'node_modules/datatables.net-buttons/js/buttons.colVis.min.js',
        'node_modules/datatables.net-colreorder/js/dataTables.colReorder.min.js',
        'node_modules/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
        'node_modules/datatables.net-keytable/js/dataTables.keyTable.min.js',
        'node_modules/datatables.net-select/js/dataTables.select.min.js',
        'node_modules/datatables.net-responsive/js/dataTables.responsive.min.js'
    ], 'public/js/datatable-depen.js')

if (mix.config.inProduction) {
  mix.version();
  mix.minify();
}

