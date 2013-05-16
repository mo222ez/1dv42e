<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

/*-----------------------------------*/
/*---------------SHOP----------------*/
/*-----------------------------------*/
Route::get('/', array('as' => 'shop_start', 'uses' => 'shop@index'));

Route::get('/categories/(:num)', array('as' => 'category_products', 'uses' => 'shop@categoryProducts'));

Route::get('/products/(:num)', array('as' => 'view_product', 'uses' => 'shop@viewProduct'));

Route::get('/checkout', array('as' => 'checkout', 'uses' => 'shop@checkout'));

Route::get('/viewCart', array('as' => 'view_cart', 'uses' => 'shop@viewCart'));

Route::post('/products/(:num)', array('as' => 'add_product_to_cart', 'uses' => 'shop@addProductToCart'));

View::composer('shop.topbar.cart', function ($view)
{
	$cart = Session::get('cart', array());
	$sum = Session::get('sum', 0);
	$totalAmountOfProducts = Session::get('totalAmountOfProducts', 0);

	$context = array(
		'cart' => $cart,
		'sum' => $sum,
		'totalAmountOfProducts' => $totalAmountOfProducts
	);

	$view->with($context);
});

/*-----------------------------------*/
/*------------- END SHOP-------------*/
/*-----------------------------------*/


/*-----------------------------------*/
/*---------------ADMIN---------------*/
/*-----------------------------------*/
Route::filter('pattern: admin*', 'auth');

Route::get('admin', array('as' => 'admin', 'uses' => 'admin@index'));


	/*----------ADMIN LOGIN-----------*/
	Route::get('login', array('as' => 'login', 'uses' => 'admin@loginGet'));

	Route::post('login', array('as' => 'login', 'uses' => 'admin@loginPost'));

	Route::get('admin/logout', array('as' => 'admin_logout', 'uses' => 'admin@logout'));


	/*----------ADMIN PRODUCTS-----------*/
	Route::get('admin/products', array('as' => 'admin_products', 'uses' => 'adminProduct@index'));

	Route::get('admin/products/new', array('as' => 'admin_new_product', 'uses' => 'adminProduct@new' ));

	Route::post('admin/products/new', array('as' => 'admin_create_product', 'uses' => 'adminProduct@create' ));

	Route::get('admin/products/(:num)/edit', array('as' => 'admin_edit_product', 'uses' => 'adminProduct@edit'));

	Route::post('admin/products/(:num)/edit', array('as' => 'admin_edit_save_product', 'uses' => 'adminProduct@editSave'));

	Route::delete('admin/products/(:num)', array('as' => 'admin_delete_product', 'uses' => 'adminProduct@delete'));

	Route::get('admin/products/stocks', array('as' => 'admin_stocks', 'uses' => 'adminProduct@stocks'));


	/*----------ADMIN CATEGORIES-----------*/
	Route::get('admin/categories', array('as' => 'admin_categories', 'uses' => 'adminCategory@index'));

	Route::get('admin/categories/new', array('as' => 'admin_new_category', 'uses' => 'adminCategory@new'));

	Route::post('admin/categories/new', array('as' => 'admin_create_category', 'uses' => 'adminCategory@create'));

	Route::get('admin/categories/(:num)/edit', array('as' => 'admin_edit_category', 'uses' => 'adminCategory@edit'));

	Route::post('admin/categories/(:num)/edit', array('as' => 'admin_edit_save_category', 'uses' => 'adminCategory@editSave'));

	Route::delete('admin/categories/(:num)', array('as' => 'admin_delete_category', 'uses' => 'adminCategory@delete'));


	/*----------ADMIN ORDERS-----------*/
	Route::get('admin/orders', array('as' => 'admin_orders', 'uses' => 'admin@orders'));

	
	/*----------ADMIN CUSTOMERS-----------*/
	Route::get('admin/customers', array('as' => 'admin_customers', 'uses' => 'admin@customers'));


	/*----------ADMIN STATISTICS-----------*/
	Route::get('admin/statistics', array('as' => 'admin_statistics', 'uses' => 'admin@statistics'));


	/*----------ADMIN SETTINGS-----------*/
	Route::get('admin/settings', array('as' => 'admin_settings', 'uses' => 'adminSettings@index'));
	Route::get('admin/settings/profile', array('as' => 'admin_profile_settings', 'uses' => 'adminSettings@profile'));
	Route::get('admin/settings/payment_methods', array('as' => 'admin_payment_methods_settings', 'uses' => 'adminSettings@paymentMethods'));
	Route::get('admin/settings/shipping_methods', array('as' => 'admin_shipping_methods_settings', 'uses' => 'adminSettings@shippingMethods'));
	Route::get('admin/settings/seo', array('as' => 'admin_seo_settings', 'uses' => 'adminSettings@seo'));
	Route::get('admin/settings/tax', array('as' => 'admin_tax_settings', 'uses' => 'adminSettings@tax'));
	Route::get('admin/settings/email', array('as' => 'admin_email_settings', 'uses' => 'adminSettings@email'));

/*-----------------------------------------*/
/*--------------- END ADMIN----------------*/
/*-----------------------------------------*/



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