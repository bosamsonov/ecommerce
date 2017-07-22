let mix = require('laravel-mix');
var glob = require("glob")
 
mix.webpackConfig({
        externals:{
            'jquery':'jQuery',
            'handlebars':'Handlebars'
        }
    })
    .js(glob.sync("resources/views/admin/**/*.js"), 'public/js/temp.js')
    .babel('public/js/temp.js', 'public/js/admin.js')
    .version();


mix.webpackConfig({
        externals:{
            'jquery':'jQuery',
            'handlebars':'Handlebars'
        }
    })
    .js(glob.sync("resources/views/crewing/**/*.js"), 'public/js/temp.js')
    .babel('public/js/temp.js', 'public/js/crewing.js')
    .version();
