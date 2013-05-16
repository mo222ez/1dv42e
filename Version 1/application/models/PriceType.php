<?php

/**
* 
*/
class PriceType extends Eloquent
{
	public function prices()
	{
		return $this->has_many('Price');
	}
}