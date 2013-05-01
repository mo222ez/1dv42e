<?php

class Admin_Product_Controller extends Base_Controller {

	public function action_index()
	{
		$products = Product::with(array('category', 'stock', 'tax'))->get();
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

		$sorted_types = array();

		foreach ($types as $type) {
			$sorted_types[$type->id] = $type;
		}

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
		$taxes = Tax::lists('value', 'id');
		$context = array(
			'categories' => $categories,
			'detailtypes' => $detailtypes,
			'taxes' => $taxes
		);
		return View::make('admin.product.new', $context);
	}

	public function action_create()
	{
		/*--- product ---*/
		$new_product = array(
			'name' => Input::get('name'),
			'description' => Input::get('description'),
			'articlenr' => Input::get('articelnr'),
			'category_id' => Input::get('category'),
			'tax_id' => Input::get('tax')
		);

		$product = new Product($new_product);
		$product->save();

		/*--- details ---*/
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

		/*--- stock ---*/
		$new_stock = array(
			'value' => Input::get('stock'),
			'product_id' => $product->id
		);

		$stock = new Stock($new_stock);
		$stock->save();

		$context = array(
			'product' => $product,
			'details' => $details
		);
		return Redirect::to_route('admin_products');
	}

	public function action_delete($product_id)
	{
		$product = Product::find($product_id);
		$product->delete();
		return Redirect::to_route('admin_products');
	}

}