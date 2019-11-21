const mix = require('laravel-mix');
const cssImport = require('postcss-import');
const cssNesting = require('postcss-nesting');
const tailwindcss = require('tailwindcss');
const path = require('path');

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
    .postCss('resources/css/app.css', 'public/css', [
        cssImport(),
        cssNesting(),
        tailwindcss(),
    ])
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve('resources/js'),
            },
        },
    })
    .version()
    .sourceMaps();

if (mix.inProduction()) {
    mix.purgeCss();
}
