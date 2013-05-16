<?php

class Admin_Product_Controller extends Base_Controller {

	public function action_index()
	{
		$products = Product::with(array('category', 'stock', 'tax', 'prices', 'media'))->get();
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
			'articlenr' => Input::get('articlenr'),
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

		/*--- prices ---*/
		$new_purchase_price = array(
			'value' => Input::get('purchase_price'),
			'pricetype_id' => 1,
			'product_id' => $product->id
		);

		$purchase_price = new Price($new_purchase_price);
		$purchase_price->save();

		$new_selling_price = array(
			'value' => Input::get('selling_price'),
			'pricetype_id' => 2,
			'product_id' => $product->id
		);

		$selling_price = new Price($new_selling_price);
		$selling_price->save();

		/*--- stock ---*/
		$new_stock = array(
			'value' => Input::get('stock'),
			'product_id' => $product->id
		);

		$stock = new Stock($new_stock);
		$stock->save();

		/*--- images ---*/
		$image = Input::file('image');
		$image_name_complete = $image['name'];
		$image_extension = File::extension($image_name_complete);
		$unique_name = uniqid();
		$new_name = $unique_name . '.' . $image_extension;

		/*--- small ---*/
		$small_layer = PHPImageWorkshop\ImageWorkshop::initFromPath($image['tmp_name']);
		$small_path = 'public/uploads/images/small/';
		$create_folders = true;
		$background_color = null;
		$small_quality = 100;

		$new_width = 152;
		$new_height = 120;

		if ($new_width > $new_height) {
			$largest_side = $new_width;
		}

		else {
			$largest_side = $new_height;
		}
		
		$small_layer->cropMaximumInPixel(0, 0, 'MM');
		$small_layer->resizeInPixel($largest_side, $largest_side);
		$small_layer->cropInPixel($new_width, $new_height, 0, 0, 'MM');

		$small_layer->save($small_path, $new_name, $create_folders, $background_color, $small_quality);

		/*--- thumbnail ---*/

		$thumb_layer = PHPImageWorkshop\ImageWorkshop::initFromPath($image['tmp_name']);
		$thumb_path = 'public/uploads/images/thumb/';
		$create_folders = true;
		$background_color = null;
		$thumb_quality = 100;
		$thumb_layer->cropMaximumInPixel(0, 0, 'MM');
		$thumb_layer->resizeInPixel(200, 200);
		$thumb_layer->save($thumb_path, $new_name, $create_folders, $background_color, $thumb_quality);

		Input::upload('image', 'public/uploads/images/big', $new_name);

		$new_medium = array(
			'name' => $new_name,
			'product_id' => $product->id,
			'mediatype_id' => 1
		);

		$medium = new Medium($new_medium);
		$medium->save();

		$context = array(
			'product' => $product,
			'details' => $details
		);
		return Redirect::to_route('admin_products');
	}

	public function action_edit($product_id)
	{
		$product = Product::with(array('prices', 'stock'))->find($product_id);
		$categories = Category::lists('name', 'id');
		$taxes = Tax::lists('value', 'id');
		//$detailtypes = ProductDetailType::get();

		$details = ProductDetail::with('detailtype')->where('product_id', '=', $product_id)->get();
		$context = array(
			'product' => $product,
			'categories' => $categories,
			'taxes' => $taxes,
			//'detailtypes' => $detailtypes,
			'details' => $details
		);
		return View::make('admin.product.edit', $context);
	}

	public function action_edit_save($product_id)
	{
		/*--- product ---*/
		$edit_product = array(
			'name' => Input::get('name'),
			'description' => Input::get('description'),
			'articlenr' => Input::get('articlenr'),
			'category_id' => Input::get('category'),
			'tax_id' => Input::get('tax')
		);

		$product = Product::with(array('prices', 'details'))->find($product_id);
		$product->name = $edit_product['name'];
		$product->description = $edit_product['description'];
		$product->articlenr = $edit_product['articlenr'];
		$product->category_id = $edit_product['category_id'];
		$product->tax_id = $edit_product['tax_id'];

		/*--- prices ---*/
		$prices = Price::where('product_id', '=', $product_id)->get();

		$edit_purchase_price = array(
			'value' => Input::get('purchase_price')
		);

		$edit_selling_price = array(
			'value' => Input::get('selling_price')
		);

		$prices[0]->value = $edit_purchase_price['value'];
		$prices[1]->value = $edit_selling_price['value'];

		/*--- stock ---*/
		$stock = Stock::where('product_id', '=', $product_id)->first();
		$edit_stock = array(
			'value' => Input::get('stock')
		);

		$stock->value = $edit_stock['value'];

		/*--- details ---*/
		//$detailtypes = ProductDetailType::get();
		$details = ProductDetail::where('product_id', '=', $product_id)->get();
		$edit_details = array();

		foreach ($details as $detail) {
			if (Input::has("productdetailtype_" . $detail->detailtype->id)) {
				/*$temp_productdetail = new ProductDetail(array(
					'value' => Input::get('productdetailtype_' . $detailtype->id),
					'product_id' => $product->id,
					'detailtype_id' => $detailtype->id
				));*/

				$temp_edit_productdetail = array(
					'value' => Input::get('productdetailtype_' . $detail->detailtype->id)
				);

				$edit_details[] = $temp_edit_productdetail;
			}
		}

		for ($i=0; $i < count($edit_details); $i++) { 
			$details[$i]->value = $edit_details[$i]['value'];
		}

		/*--- save ---*/
		$prices[0]->save();
		$prices[1]->save();

		$stock->save();

		foreach ($details as $detail) {
			$detail->save();
		}

		$product->save();
		
		return Redirect::to_route('admin_products');
	}

	public function action_delete($product_id)
	{
		$product = Product::find($product_id);
		$product->delete();
		return Redirect::to_route('admin_products');
	}

}