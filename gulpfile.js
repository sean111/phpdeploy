var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass( 'app.sass' );
    mix.scripts( [ '../bower/jquery/dist/jquery.js', '../bower/bootstrap-sass/assets/javascripts/bootstrap.js', 'custom.js' ] );
    mix.copy( 'resources/assets/bower/font-awesome/fonts/', 'public/fonts/' );
});
