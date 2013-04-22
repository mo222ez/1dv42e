<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public function __construct()
	{
		Asset::add('stylesheet', 'css/stylesheet.css');
		Asset::add('form', 'css/form.css');
		Asset::add('menu', 'css/menu.css');
		parent::__construct();
	}

}