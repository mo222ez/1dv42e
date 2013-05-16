<?php

class AdminProduct_Controller extends Base_Controller {

	public function action_index()
	{
		$products = Product::with(array('category', 'stock', 'tax', 'prices', 'media'))->order_by('articlenr', 'asc')->paginate(10);
		$details  = ProductDetail::with('detailtype')->order_by('product_id')->get();
		$types    = ProductDetailType::get();

		$detailsSortedByProduct = array();
		$detailsSortedByType    = array();
		$tempDetails            = array();

		foreach ($products->results as $product) {
			$detailsSortedByProduct[$product->id] = array();
		}

		foreach ($details as $detail) {
			$detailsSortedByProduct[$detail->product_id][$detail->detailtype_id] = $detail;
		}

		$sortedTypes = array();

		foreach ($types as $type) {
			$sortedTypes[$type->id] = $type;
		}

		$context = array(
			'products'      => $products,
			'details'       => $details,
			'types'         => $sortedTypes,
			'sortedDetails' => $detailsSortedByProduct
		);
		return View::make('admin.product.index', $context);
	}

	public function action_new()
	{
		$categories  = Category::order_by('name', 'asc')->lists('name', 'id');
		$detailtypes = ProductDetailType::get();
		$taxes       = Tax::lists('value', 'id');

		$context = array(
			'categories'  => $categories,
			'detailtypes' => $detailtypes,
			'taxes'       => $taxes
		);
		return View::make('admin.product.new', $context);
	}

	public function action_create()
	{
		/*--- product ---*/
		$newProduct = array(
			'name'              => Input::get('name'),
			'short_description' => Input::get('shortDescription'),
			'long_description'  => Input::get('longDescription'),
			'articlenr'         => Input::get('articlenr'),
			'category_id'       => Input::get('category'),
			'tax_id'            => Input::get('tax')
		);

		$product = new Product($newProduct);
		$product->save();

		/*--- details ---*/
		$detailtypes = ProductDetailType::get();
		$details     = array();

		foreach ($detailtypes as $detailtype) {
			if (Input::has("productdetailtype_" . $detailtype->id)) {
				$tempProductdetail = new ProductDetail(array(
					'value'         => Input::get('productdetailtype_' . $detailtype->id),
					'product_id'    => $product->id,
					'detailtype_id' => $detailtype->id
				));

				$tempProductdetail->save();
				$details[] = $tempProductdetail;
			}
		}

		$detailRules = array(
			'value' => 'required'
		);

		/*--- purchasePrice ---*/
		$newPurchasePrice = array(
			'value'        => Input::get('purchasePrice'),
			'pricetype_id' => 1,
			'product_id'   => $product->id
		);

		$purchasePriceRules = array(
			'value' => 'required'
		);

		$purchasePrice = new Price($newPurchasePrice);
		$purchasePrice->save();

		/*--- sellingPrice ---*/
		$newSellingPrice = array(
			'value'        => Input::get('sellingPrice'),
			'pricetype_id' => 2,
			'product_id'   => $product->id
		);

		$sellingPriceRules = array(
			'value' => 'required'
		);

		$sellingPrice = new Price($newSellingPrice);
		$sellingPrice->save();

		/*--- stock ---*/
		$newStock = array(
			'value'      => Input::get('stock'),
			'product_id' => $product->id
		);

		$stockRules = array(
			'value' => 'required'
		);

		$stock = new Stock($newStock);
		$stock->save();

		/*--- images ---*/
		$image             = Input::file('image');
		$imageNameComplete = $image['name'];
		$imageExtension    = File::extension($imageNameComplete);

		$uniqueName = uniqid();
		$newName    = $uniqueName . '.' . $imageExtension;

		/*--- small ---*/
		$smallLayer      = PHPImageWorkshop\ImageWorkshop::initFromPath($image['tmp_name']);
		$smallPath       = 'public/uploads/images/small/';
		$createFolders   = true;
		$backgroundColor = null;
		$smallQuality    = 100;

		$newWidth  = 152;
		$newHeight = 120;

		if ($newWidth > $newHeight) {
			$largest_side = $newWidth;
		}

		else {
			$largest_side = $newHeight;
		}
		
		$smallLayer->cropMaximumInPixel(0, 0, 'MM');
		$smallLayer->resizeInPixel($largest_side, $largest_side);
		$smallLayer->cropInPixel($newWidth, $newHeight, 0, 0, 'MM');

		$smallLayer->save($smallPath, $newName, $createFolders, $backgroundColor, $smallQuality);

		/*--- thumbnail ---*/

		$thumbLayer      = PHPImageWorkshop\ImageWorkshop::initFromPath($image['tmp_name']);
		$thumbPath       = 'public/uploads/images/thumb/';
		$createFolders   = true;
		$backgroundColor = null;
		$thumbQuality    = 100;

		$thumbLayer->cropMaximumInPixel(0, 0, 'MM');
		$thumbLayer->resizeInPixel(200, 200);
		$thumbLayer->save($thumbPath, $newName, $createFolders, $backgroundColor, $thumbQuality);

		Input::upload('image', 'public/uploads/images/big', $newName);

		$newMedium = array(
			'name'         => $newName,
			'product_id'   => $product->id,
			'mediatype_id' => 1
		);

		$medium = new Medium($newMedium);
		$medium->save();

		$context = array(
			'product' => $product,
			'details' => $details
		);
		return Redirect::to_route('admin_products');
	}

	public function action_edit($productID)
	{
		$product    = Product::with(array('prices', 'stock'))->find($productID);
		$categories = Category::lists('name', 'id');
		$taxes      = Tax::lists('value', 'id');
		$details    = ProductDetail::with('detailtype')->where('product_id', '=', $productID)->get();

		$context = array(
			'product'       => $product,
			'categories'    => $categories,
			'taxes'         => $taxes,
			'details'       => $details
		);
		return View::make('admin.product.edit', $context);
	}

	public function action_editSave($productID)
	{
		/*--- product ---*/
		$editProduct = array(
			'name'              => Input::get('name'),
			'short_description' => Input::get('shortDescription'),
			'long_description'  => Input::get('longDescription'),
			'articlenr'         => Input::get('articlenr'),
			'category_id'       => Input::get('category'),
			'tax_id'            => Input::get('tax')
		);

		$product                    = Product::with(array('prices', 'details', 'media'))->find($productID);
		$product->name              = $editProduct['name'];
		$product->short_description = $editProduct['short_description'];
		$product->long_description  = $editProduct['long_description'];
		$product->articlenr         = $editProduct['articlenr'];
		$product->category_id       = $editProduct['category_id'];
		$product->tax_id            = $editProduct['tax_id'];

		/*--- prices ---*/
		$prices = Price::where('product_id', '=', $productID)->get();

		$editPurchasePrice = array(
			'value' => Input::get('purchasePrice')
		);

		$editSellingPrice = array(
			'value' => Input::get('sellingPrice')
		);

		$prices[0]->value = $editPurchasePrice['value'];
		$prices[1]->value = $editSellingPrice['value'];

		/*--- stock ---*/
		$stock = Stock::where('product_id', '=', $productID)->first();
		$editStock = array(
			'value' => Input::get('stock')
		);

		$stock->value = $editStock['value'];

		/*--- details ---*/
		$details     = ProductDetail::where('product_id', '=', $productID)->get();
		$editDetails = array();

		foreach ($details as $detail) {
			if (Input::has("productdetailtype_" . $detail->detailtype->id)) {
				$tempEditProductdetail = array(
					'value' => Input::get('productdetailtype_' . $detail->detailtype->id)
				);

				$editDetails[] = $tempEditProductdetail;
			}
		}

		for ($i=0; $i < count($editDetails); $i++) { 
			$details[$i]->value = $editDetails[$i]['value'];
		}

		if (Input::has_file('image')) {
			/*--- images ---*/
			$image             = Input::file('image');
			$imageNameComplete = $image['name'];
			$imageExtension    = File::extension($imageNameComplete);
			
			$uniqueName = uniqid();
			//$newName    = $uniqueName . '.' . $imageExtension;
			$newName = $product->media[0]->name;

			//dd($image);

			/*--- small ---*/
			$smallLayer      = PHPImageWorkshop\ImageWorkshop::initFromPath($image['tmp_name']);
			$smallPath       = 'public/uploads/images/small/';
			$createFolders   = true;
			$backgroundColor = null;
			$smallQuality    = 100;

			$newWidth  = 152;
			$newHeight = 120;

			if ($newWidth > $newHeight) {
				$largest_side = $newWidth;
			}

			else {
				$largest_side = $newHeight;
			}
			
			$smallLayer->cropMaximumInPixel(0, 0, 'MM');
			$smallLayer->resizeInPixel($largest_side, $largest_side);
			$smallLayer->cropInPixel($newWidth, $newHeight, 0, 0, 'MM');

			$smallLayer->save($smallPath, $newName, $createFolders, $backgroundColor, $smallQuality);

			/*--- thumbnail ---*/

			$thumbLayer      = PHPImageWorkshop\ImageWorkshop::initFromPath($image['tmp_name']);
			$thumbPath       = 'public/uploads/images/thumb/';
			$createFolders   = true;
			$backgroundColor = null;
			$thumbQuality    = 100;

			$thumbLayer->cropMaximumInPixel(0, 0, 'MM');
			$thumbLayer->resizeInPixel(200, 200);
			$thumbLayer->save($thumbPath, $newName, $createFolders, $backgroundColor, $thumbQuality);

			Input::upload('image', 'public/uploads/images/big', $newName);

			/*$newMedium = array(
				'name'         => $newName,
				'product_id'   => $product->id,
				'mediatype_id' => 1
			);

			$medium = new Medium($newMedium);
			$medium->save();*/
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

	public function action_delete($productID)
	{
		$product = Product::find($productID);
		$product->delete();
		return Redirect::to_route('admin_products');
	}

	public function action_stocks()
	{
		$products = Product::with(array('category', 'stock', 'tax', 'prices', 'media'))->get();
		$context = array(
			'products' => $products
		);
		return View::make('admin.product.stocks', $context);
	}

}