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
    .sass('resources/sass/app.scss', 'public/css');



mix.scripts([

    'public/assets/js/popper.min.js',
    'public/assets/js/bootstrap.min.js',
    'public/assets/plugins/fancybox/jquery.fancybox.min.js',
    'public/assets/js/slick.js',
    'public/assets/js/moment.min.js',
    'public/assets/plugins/daterangepicker/daterangepicker.js',
    'public/assets/plugins/theia-sticky-sidebar/ResizeSensor.js',
    'public/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js',
    'public/assets/plugins/select2/js/select2.min.js',
    'public/assets/plugins/dropzone/dropzone.min.js',
    'public/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js',
    'public/assets/js/profile-settings.js',
    'public/assets/js/circle-progress.min.js',
    'public/assets/js/script.js'
], 'public/js/fontend.js').version();


//mix.browserSync('http://www.doctorshab.com');
