<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

/*Route::get('/', function()
{
	return View::make('home.index');
});*/

Route::get('/', array('as' => 'home', 'uses' => 'home@index'));

/*----------ADMIN-----------*/

Route::filter('pattern: admin*', 'auth');

Route::get('admin', array('as' => 'admin', 'uses' => 'admin@index'));

	/*----------ADMIN LOGIN-----------*/

	Route::get('login', array('as' => 'login', 'uses' => 'admin@login_get'));

	Route::post('login', array('as' => 'login', 'uses' => 'admin@login_post'));

	Route::get('admin/logout', array('as' => 'admin_logout', 'uses' => 'admin@logout'));

	/*----------END ADMIN LOGIN-------*/

	/*----------ADMIN PRODUCTS-----------*/

	Route::get('admin/products', array('as' => 'admin_products', 'uses' => 'admin_product@index'));

	Route::get('admin/products/new', array('as' => 'admin_new_product', 'uses' => 'admin_product@new' ));

	Route::post('admin/products/new', array('as' => 'admin_create_product', 'uses' => 'admin_product@create' ));

	/*----------END ADMIN PRODUCTS-------*/

	/*----------ADMIN CATEGORIES-----------*/

	Route::get('admin/categories', array('as' => 'admin_categories', 'uses' => 'admin_category@index'));

	Route::get('admin/categories/new', array('as' => 'admin_new_category', 'uses' => 'admin_category@new'));

	Route::post('admin/categories/new', array('as' => 'admin_create_category', 'uses' => 'admin_category@create'));

	Route::get('admin/categories/(:num)/edit', array('as' => 'admin_edit_category', 'uses' => 'admin_category@edit'));

	Route::post('admin/categories/(:num)/edit', array('as' => 'admin_edit_save_category', 'uses' => 'admin_category@edit_save'));

	/*----------END ADMIN CATEGORIES-------*/

	/*----------ADMIN ORDERS-----------*/

	Route::get('admin/orders', array('as' => 'admin_orders', 'uses' => 'admin@orders'));

	/*----------END ADMIN ORDERS-------*/

	/*----------ADMIN CUSTOMERS-----------*/

	Route::get('admin/customers', array('as' => 'admin_customers', 'uses' => 'admin@customers'));

	/*----------END ADMIN CUSTOMERS-------*/

	/*----------ADMIN STATISTICS-----------*/

	Route::get('admin/statistics', array('as' => 'admin_statistics', 'uses' => 'admin@statistics'));

	/*----------END ADMIN STATISTICS-------*/

	/*----------ADMIN SETTINGS-----------*/

	Route::get('admin/settings', array('as' => 'admin_settings', 'uses' => 'admin_settings@index'));
	Route::get('admin/settings/profile', array('as' => 'admin_profile_settings', 'uses' => 'admin_settings@profile'));
	Route::get('admin/settings/payment_methods', array('as' => 'admin_payment_methods_settings', 'uses' => 'admin_settings@payment_methods'));
	Route::get('admin/settings/shipping_methods', array('as' => 'admin_shipping_methods_settings', 'uses' => 'admin_settings@shipping_methods'));
	Route::get('admin/settings/seo', array('as' => 'admin_seo_settings', 'uses' => 'admin_settings@seo'));
	Route::get('admin/settings/tax', array('as' => 'admin_tax_settings', 'uses' => 'admin_settings@tax'));
	Route::get('admin/settings/email', array('as' => 'admin_email_settings', 'uses' => 'admin_settings@email'));

	/*----------END ADMIN SETTINGS-------*/

/*----------END ADMIN-------*/

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application. The exception object
| that is captured during execution is then passed to the 500 listener.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});