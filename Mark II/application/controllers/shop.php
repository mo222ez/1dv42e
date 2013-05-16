<?php

class Shop_Controller extends Base_Controller {

	public function action_index()
	{
		switch (Input::get('sortOrder', '')) {
			case 'nameDesc':
				$products = Product::with(array('prices', 'media', 'tax'))->order_by('name', 'asc')->get();
				break;
			case 'nameAsc':
				$products = Product::with(array('prices', 'media', 'tax'))->order_by('name', 'desc')->get();
				break;
			case 'priceHigh':
				$products = Product::with(array('prices', 'media', 'tax'))->order_by('price_id.value', 'desc')->get();
				break;
			case 'priceLow':
				$products = Product::with(array('prices', 'media', 'tax'))->order_by('price_id.value', 'asc')->get();
				break;
			case 'oldest':
				$products = Product::with(array('prices', 'media', 'tax'))->order_by('created_at', 'asc')->get();
				break;
			case 'newest':
				$products = Product::with(array('prices', 'media', 'tax'))->order_by('created_at', 'desc')->get();
				break;
			default:
				$products = Product::with(array('prices', 'media', 'tax'))->get();
				break;
		}

		//$products = Product::with(array('prices', 'media', 'tax'))->get();

		$context = array(
			'products'   => $products 
		);

		return View::make('shop.index', $context);
	}


	public function action_viewCart()
	{
		$cart = Session::get('cart', array());
		$sum = Session::get('sum', 0);
		$totalAmountOfProducts = Session::get('totalAmountOfProducts', 0);

		$context = array(
			'cart' => $cart,
			'sum' => $sum,
			'totalAmountOfProducts' => $totalAmountOfProducts
		);
		return View::make('shop.cart.viewCart', $context);
	}


	public function action_checkout()
	{
		$cart = Session::get('cart', array());
		$sum = Session::get('sum', 0);
		$totalAmountOfProducts = Session::get('totalAmountOfProducts', 0);

		$context = array(
			'cart' => $cart,
			'sum' => $sum,
			'totalAmountOfProducts' => $totalAmountOfProducts
		);
		return View::make('shop.cart.checkout', $context);
	}


	public function action_viewProduct($productID)
	{
		$product = Product::with(array('prices', 'media', 'tax', 'stock'))->find($productID);

		$context = array(
			'product'    => $product
		);
		return View::make('shop.product.viewProduct', $context);
	}


	public function action_categoryProducts($categoryID)
	{
		$categories = Category::get();
		switch (Input::get('sortOrder', '')) {
			case 'nameDesc':
				$products = Product::with(array('prices', 'media', 'tax'))->where('category_id', '=', $categoryID)->order_by('name', 'asc')->get();
				break;
			case 'nameAsc':
				$products = Product::with(array('prices', 'media', 'tax'))->where('category_id', '=', $categoryID)->order_by('name', 'desc')->get();
				break;
			case 'priceHigh':
				$products = Product::with(array('prices', 'media', 'tax'))->where('category_id', '=', $categoryID)->order_by('price_id.value', 'desc')->get();
				break;
			case 'priceLow':
				$products = Product::with(array('prices', 'media', 'tax'))->where('category_id', '=', $categoryID)->order_by('price_id.value', 'asc')->get();
				break;
			case 'oldest':
				$products = Product::with(array('prices', 'media', 'tax'))->where('category_id', '=', $categoryID)->order_by('created_at', 'asc')->get();
				break;
			case 'newest':
				$products = Product::with(array('prices', 'media', 'tax'))->where('category_id', '=', $categoryID)->order_by('created_at', 'desc')->get();
				break;
			default:
				$products = Product::with(array('prices', 'media', 'tax'))->where('category_id', '=', $categoryID)->get();
				break;
		}
		
		$currentCategory = null;
		foreach ($categories as $category) {
			if ($category->id == $categoryID) {
				$currentCategory = $category;
				break;
			}
		}

		$context = array(
			'categories'      => $categories,
			'currentCategory' => $currentCategory,
			'products'        => $products
		);

		return View::make('shop.product.listProducts', $context);
	}

	public function action_addProductToCart()
	{
		$productID = Input::get('productID');
		$product = DB::table('products AS p')
					->join('categories', 'p.category_id', '=', 'categories.id')
					->join('prices', 'prices.product_id', '=', 'p.id')
					->join('media', 'media.product_id', '=', 'p.id')
					->join('taxes', 'p.tax_id', '=', 'taxes.id')
					->join('stocks', 'stocks.product_id', '=', 'p.id')
					->where('prices.pricetype_id', '=', '2')
					->where('p.id', '=', $productID)
					->get(array('p.id', 'p.name', 'p.short_description', 'p.articlenr', 'categories.name AS category_name', 'prices.value AS selling_price', 'taxes.value AS tax', 'stocks.value AS stock', 'media.name AS image_name'))[0];
		if (Session::has('cart')) {
			$cart = Session::get('cart');
		}

		else {
			$cart = array();
		}


		$productGroup = array(
			'amount'  => Input::get('amount'),
			'product' => $product
		);

		if (array_key_exists($productID, $cart)) {
			$cart[$productID]['amount'] = $cart[$productID]['amount'] + Input::get('amount');
		}

		else {
			$cart[$product->id] = $productGroup;
		}

		$sum = 0;

		foreach ($cart as $productGroup) {
			$tempProduct = $productGroup['product'];
			$tempSum     = $tempProduct->selling_price * (($tempProduct->tax / 100) + 1);
			if ($productGroup['amount'] > 1) {
				$tempSum = $tempSum * intval($productGroup['amount']);
			}

			$sum = $sum + $tempSum;
		}

		$totalAmountOfProducts = 0;

		foreach ($cart as $productGroup) {
			$tempAmount = $productGroup['amount'];
			$totalAmountOfProducts = $totalAmountOfProducts + $tempAmount;
		}

		Session::put('totalAmountOfProducts', $totalAmountOfProducts);
		Session::put('sum', $sum);
		Session::put('cart', $cart);
		
		$context = array(
			 'tempProduct' => $product
		);

		return Redirect::to_route('view_product', $productID);
	}

}