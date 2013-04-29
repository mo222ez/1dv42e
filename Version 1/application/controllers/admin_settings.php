<?php

class Admin_Settings_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('admin.settings.index');
	}

	public function action_profile()
	{
		return View::make('admin.settings.profile');
	}

	public function action_payment_methods()
	{
		return View::make('admin.settings.payment_methods');
	}

	public function action_shipping_methods()
	{
		return View::make('admin.settings.shipping_methods');
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