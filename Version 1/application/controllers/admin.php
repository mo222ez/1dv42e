<?php

class Admin_Controller extends Base_Controller {

	public function action_index()
	{
		//$details = ProductDetail::where('value', '<', 10)->get();
		/*$details = ProductDetail::with('product')->where(function ($query)
						{
							$query->where('detailtype_id', '=', DB::raw('3'));
							$query->where('value', '<=', DB::raw('100'));
						})->get();*/
		//$details = DB::query('SELECT * FROM productdetails WHERE detailtype_id = 3 AND value <= 10');
		
		//$products = Product::get();
		$products = Product::with('details')
							->join('productdetails', 'products.id', '=', 'productdetails.product_id')
							->where(function ($query)
							{
								$query->where('detailtype_id', '=', '3');
								$query->where('value', '<=', DB::raw('10'));
							})->get();
		$context = array(
			'products' => $products
		);
		return View::make('admin.index', $context);
	}

	public function action_login_get()
	{
		Asset::container('login')->add('login_css', 'css/login.css');
		return view::make('admin.login');
	}

	public function action_login_post()
	{
		$userdata = array(
			'username' => Input::get('email'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($userdata)) {
			return Redirect::to_route('admin');
		}

		else {
			return Redirect::to_route('login')
				->with('login_errors', true);
		}
	}

	public function action_logout()
	{
		Auth::logout();
		return Redirect::to_route('home');
	}

	/*public function action_products()
	{
		return View::make('admin.product.index');
	}*/

	/*public function action_categories()
	{
		return View::make('admin.category.index');
	}*/

	public function action_orders()
	{
		return View::make('admin.order.index');
	}

	public function action_customers()
	{
		return View::make('admin.customer.index');
	}

	public function action_statistics()
	{
		return View::make('admin.statistic.index');
	}

	/*public function action_settings()
	{
		return View::make('admin.settings.index');
	}*/

}