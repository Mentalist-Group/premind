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

// ESLintに関する設定（本番環境ではESLintは使用しない）
if (!mix.inProduction()) {
    mix.webpackConfig({
        module: {
            rules: [
                {
                enforce: 'pre',
                exclude: /node_modules/,
                loader: 'eslint-loader',
                test: /\.(js|vue)?$/,
                },
            ],
        },
    })
}

mix.browserSync({
    files: ['resources/js/**/*'],
    proxy: '0.0.0.0:8081', 
    open: false
    })
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');