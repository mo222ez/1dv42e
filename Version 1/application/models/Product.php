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
}