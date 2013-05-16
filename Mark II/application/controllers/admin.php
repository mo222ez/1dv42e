<?php

class Admin_Controller extends Base_Controller {

	public function action_index()
	{
		$stocks = Stock::with('product')->where('value', '<=', DB::raw('10'))->get();
		
		$context = array(
			'stocks' => $stocks
		);
		return View::make('admin.index', $context);
	}

	public function action_loginGet()
	{
		return view::make('admin.login');
	}

	public function action_loginPost()
	{
		$userdata = array(
			'username' => Input::get('email'),
			'password' => Input::get('password'),
			'remember' => true
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
		return Redirect::to_route('shop_start');
	}

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

}