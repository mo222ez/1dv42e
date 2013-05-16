<?php

/**
* 
*/
class Category extends CustomBaseModel
{
	protected $rules = array(
		'name' => 'required|unique:categories'
	);

	public function products()
	{
		return $this->has_many('Product');
	}
}