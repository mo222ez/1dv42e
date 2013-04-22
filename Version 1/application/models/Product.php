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
}