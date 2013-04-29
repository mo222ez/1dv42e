<?php

class Admin_Product_Controller extends Base_Controller {

	public function action_index()
	{
		/*$detailtypes = ProductDetailType::get();
		$details = ProductDetail::get();
		$products = Product::get();*/
		//$products = Product::with(array('details', 'details.detailtype'))->get();
		
		/*$products = DB::table('products')
						->join('productdetails', 'products.id', '=', 'productdetails.product_id')
						->join('productdetailtypes', 'productdetails.detailtype_id', '=', 'productdetailtypes.id')
						->get();*/

		$products = Product::join('productdetails', 'products.id', '=', 'productdetails.product_id')
						->join('productdetailtypes', 'productdetails.detailtype_id', '=', 'productdetailtypes.id')
						->get('products.*', 'productdetailtypes.name AS detail_name');

		$context = array(
			/*'detailtypes' => $detailtypes,
			'details' => $details,*/
			'products' => $products
		);
		return View::make('admin.product.index', $context);
	}

	public function action_new()
	{
		$categories = Category::lists('name', 'id');
		$detailtypes = ProductDetailType::get();
		$context = array('categories' => $categories, 'detailtypes' => $detailtypes);
		return View::make('admin.product.new', $context);
	}

	public function action_create()
	{
		$new_product = array(
			'name' => Input::get('name'),
			'description' => Input::get('description'),
			'articlenr' => Input::get('articelnr'),
			'category_id' => Input::get('category')
		);

		$product = new Product($new_product);
		$product->save();

		$detailtypes = ProductDetailType::get();
		$details = array();

		foreach ($detailtypes as $detailtype) {
			if (Input::has("productdetailtype_" . $detailtype->id)) {
				$temp_productdetail = new ProductDetail(array(
					'value' => Input::get('productdetailtype_' . $detailtype->id),
					'product_id' => $product->id,
					'detailtype_id' => $detailtype->id
				));

				$temp_productdetail->save();

				$details[] = $temp_productdetail;
			}
		}

		$context = array(
			'product' => $product,
			'details' => $details
		);
		return View::make('admin.product.temp', $context);

		/*$new_post = array(
			'title' => Input::get('title'),
			'content' => Input::get('content'),
			'author_id' => Input::get('author_id')
		);

		$rules = array(
			'title' => 'required|min:3|max:128',
			'content' => 'required'
		);

		$v = Validator::make($new_post, $rules);

		if ($v->fails()) {
			return Redirect::to_route('new_post')
				->with('user', Auth::user())
				->with_errors($v)
				->with_input();
		}

		$post = new Post($new_post);
		$post->save();

		return Redirect::to('view/' . $post->id);*/
	}

}