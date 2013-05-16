<?php

/**
* 
*/
class Product extends Eloquent
{
	public function details()
	{
		return $this->has_many('ProductDetail', 'product_id');
	}

	public function category()
	{
		return $this->belongs_to('Category');
	}

	public function stock()
	{
		return $this->has_one('Stock');
	}

	public function tax()
	{
		return $this->belongs_to('Tax');
	}

	public function prices()
	{
		return $this->has_many('Price');
	}

	public function media()
	{
		return $this->has_many('Medium');
	}

	public static function validate($input)
	{
		$rules = array(
			'name' => 'required',
			'short_description' => 'required',
			'long_description' => 'required',
			'articlenr' => 'required',
			'category_id' => 'required',
		);

		return Validator::make($input, $rules);
	}
}