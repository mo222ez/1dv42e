<?php

/**
* 
*/
class Stock extends Eloquent
{
	public function product()
	{
		return $this->belongs_to('Product');
	}
}