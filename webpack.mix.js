const mix = require('laravel-mix');
const autoprefixer = require('autoprefixer');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('vendor/unisharp/laravel-ckeditor', 'public/vendor/unisharp/laravel-ckeditor')
    .options({
        autoprefixer: {
            options: {
                overrideBrowserslist: [
                    'last 10 versions',
                ]
            }
        }
    })
    .sourceMaps();
    //.browserSync('http://taylorproperties-local');