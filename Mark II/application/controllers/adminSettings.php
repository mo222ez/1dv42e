<?php

class AdminSettings_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('admin.settings.index');
	}

	public function action_profile()
	{
		return View::make('admin.settings.profile');
	}

	public function action_paymentMethods()
	{
		return View::make('admin.settings.paymentMethods');
	}

	public function action_shippingMethods()
	{
		return View::make('admin.settings.shippingMethods');
	}

	public function action_seo()
	{
		return View::make('admin.settings.seo');
	}

	public function action_tax()
	{
		return View::make('admin.settings.tax');
	}

	public function action_email()
	{
		return View::make('admin.settings.email');
	}

}