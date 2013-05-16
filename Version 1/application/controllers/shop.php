<?php

class Shop_Controller extends Base_Controller {

	public function action_index()
	{
		$categories = Category::get();
		$products = Product::with(array('prices', 'media', 'tax'))->get();

		$context = array(
			'categories' => $categories,
			'products' => $products 
		);

		return View::make('shop.index', $context);
	}


	public function action_viewCart()
	{
		return View::make('shop.cart.viewCart');
	}


	public function action_checkout()
	{
		return View::make('shop.cart.checkout');
	}


	public function action_viewProduct($product)
	{
		return View::make('shop.product.viewProduct');
	}

}