const mix = require('laravel-mix');
const VuetifyLoaderPlugin = require("vuetify-loader/lib/plugin");

mix.extend(
    "vuetify",
    new (class {
        webpackConfig(config) {
            config.plugins.push(new VuetifyLoaderPlugin());
        }
    })()
);

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .options({
        postCss: [
            require("postcss-css-variables"),
            require("postcss-import"),
            require("postcss-nested"),
            require("tailwindcss"),
            require("autoprefixer"),
        ],
        purifyCss: true,
    })
    .browserSync("https://ar-challenge.dev.genealabs.com")
;
