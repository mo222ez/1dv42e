<?php

class Admin_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('admin.index');
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