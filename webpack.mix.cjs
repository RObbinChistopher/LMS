const mix = require('laravel-mix');
const tailwindcss = require('@tailwindcss/postcss');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        tailwindcss, // Updated plugin import
    ])
    .version();
