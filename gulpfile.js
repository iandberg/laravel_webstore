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
    mix.sass([
    	'app.scss', //includes bootstrap here
    	'product.scss',
		'cart.scss',
	],'resources/assets/css'); //destination

	mix.styles([ //consolidate css
    	'app.css', //the mix.sass already consolidates, but hey...
    	//add more css if needed
	],'public/css/webstore.css'); //destination
});
