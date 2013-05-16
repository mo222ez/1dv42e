<?php

/**
* 
*/
class Tax extends Eloquent
{
	public function products()
	{
		return $this->has_many('Product');
	}
}