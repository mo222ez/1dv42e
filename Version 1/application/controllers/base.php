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
		Asset::container('login')->add('login', 'css/admin/login.css');
		Asset::container('admin')->add('stylesheet', 'css/admin/stylesheet.css');
		Asset::container('admin')->add('form', 'css/admin/form.css');
		Asset::container('admin')->add('menu', 'css/admin/menu.css');
		Asset::container('admin')->add('tinyMCE', 'js/tinymce/tinymce.min.js');

		Asset::container('shop')->add('basic', 'css/shop/basic.css');
		Asset::container('shop')->add('menu', 'css/shop/menu.css');
		Asset::container('shop')->add('text', 'css/shop/text.css');
		Asset::container('shop')->add('button', 'css/shop/button.css');
		Asset::container('shop')->add('products', 'css/shop/products.css');
		Asset::container('shop')->add('product', 'css/shop/product.css');
		Asset::container('shop')->add('jQuery', 'js/jquery.js');
		Asset::container('shop')->add('slideShow', 'js/scriptSlideShow.js');

		parent::__construct();
	}

}