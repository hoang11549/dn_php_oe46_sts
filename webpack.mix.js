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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
/**--------------CSS--------*/
mix.styles('resources/css/style.css','public/assets/css/style.css')
mix.styles('resources/css/style.min.css','public/assets/css/style.min.css')
mix.styles('resources/css/flexCard.css','public/assets/css/flexCard.css')
mix.styles('resources/css/search.css', 'public//assets/css/search.css')
mix.styles('resource/css/listStudent.css','public//assets/css/listStudent.css')
/*---------------js----------*/
mix.js('resources/js/app-style-switcher.js','public/assets/js/app-style-switcher.js')
mix.js('resources/js/bootstrap.js','public/assets/js/bootstrap.js')
mix.js('resources/js/custom.js','public/assets/js/custom.js')
mix.js('resources/js/sidebarmenu.js','public/assets/js/sidebarmenu.js')
mix.js('resources/js/waves.js','public/assets/js/waves.js')
mix.js('resources/js/pages/dashboards/dashboard1.js','public/assets/js/pages/dashboards/dashboard1.js')
mix.js('resources/js/cket.js','public/assets/js/cket.js')
// mix.js('resources/js/searchList.js','public/asstets/js/searchList.js')

/**--------scss------------- */
mix.sass('resources/sass/card.scss','public/assets/css/card.css')
