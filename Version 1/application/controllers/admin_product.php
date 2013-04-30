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

		/*$products = Product::join('productdetails', 'products.id', '=', 'productdetails.product_id')
						->join('productdetailtypes', 'productdetails.detailtype_id', '=', 'productdetailtypes.id')
						->get('products.*', 'productdetailtypes.name AS detail_name');*/

		/*$products = DB::query('SELECT p.id, p.name, p.description, p.articlenr, c.name AS category_name, pd.value, pdt.name AS detailtype, pd.detailtype_id, p.created_at, p.updated_at FROM products as p
								INNER JOIN categories as c
								ON p.category_id = c.id
								INNER JOIN productdetails AS pd
								ON p.id = pd.product_id
								INNER JOIN productdetailtypes as pdt
								ON pd.detailtype_id = pdt.id
								ORDER BY id');*/
		$products = Product::with('category')->get();
		//$products = Product::with(array('category', 'details'))->get();
		$details = ProductDetail::with('detailtype')->order_by('product_id')->get();
		$types = ProductDetailType::get();

		$details_sorted_by_product = array();
		$details_sorted_by_type = array();
		$temp_details = array();

		foreach ($products as $product) {
			$details_sorted_by_product[$product->id] = array();
		}

		foreach ($details as $detail) {
			$details_sorted_by_product[$detail->product_id][$detail->detailtype_id] = $detail;
		}

		/*$temp_type_id = $types[0]->id;
		$temp_product_id = $details[0]->product_id;



		foreach ($details as $detail) {
			$details_sorted_by_product[$temp_product_id] = $temp_details;
			if ($temp_product_id != $detail->product_id) {
				
				$temp_product_id = $detail->product_id;
				$temp_details = array();
			}

			$temp_details[$detail->detailtype_id] = $detail;
			
		}*/

		$sorted_types = array();

		foreach ($types as $type) {
			$sorted_types[$type->id] = $type;
		}

		/*$products2 = array();
		$last_id = $products[0]->id;
		$temp_array = array();
		foreach ($products as $product) {
			if ($last_id != $product->id) {
				$last_id = $product->id;
				$products2[] = $temp_array;
				$temp_array = array();
			}

			$temp_array[$product->detailtype] = $product;
		}*/

		$context = array(
			'products' => $products,
			'details' => $details,
			'types' => $sorted_types,
			'sorted_details' => $details_sorted_by_product
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
		//return View::make('admin.product.temp', $context);
		return Redirect::to_route('admin_products');

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

	public function action_delete($product_id)
	{
		$product = Product::find($product_id);
		$product->delete();
		return Redirect::to_route('admin_products');
	}

}