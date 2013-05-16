<?php

class ImageUpload_Controller extends Base_Controller {
	public function action_index()
	{
		$images = Medium::get();
		$context = array(
			'images' => $images
		);
		return View::make('imageupload.index', $context);
	}

	public function action_new()
	{
		return View::make('imageupload.upload');
	}

	public function action_upload()
	{
		$image = Input::file('image');
		$image_name_complete = $image['name'];
		$image_extenstion = File::extension($image_name_complete);
		$unique_name = uniqid();
		$new_name = $unique_name . '.' . $image_extenstion;

		$image['extension'] = $image_extenstion;
		$image['name_without_extension'] = basename($image_name_complete, '.' . $image_extenstion);

		$new_medium = array(
			'name' => $new_name
		);

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

		/*--- save ---*/

		Input::upload('image', 'public/uploads/images/big', $new_name);

		$medium = new Medium($new_medium);
		$medium->save();

		$context = array('image' => $image);

		//return View::make('imageupload.temp', $context);
		return Redirect::to_route('start');
	}

}