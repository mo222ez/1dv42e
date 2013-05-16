<?php

/**
* 
*/
class ProductDetail extends Eloquent
{
	public function product()
	{
		return $this->belongs_to('Product');
	}

	public function detailtype()
	{
		return $this->belongs_to('ProductDetailType');
	}
}