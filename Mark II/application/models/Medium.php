<?php

/**
* 
*/
class Medium extends Eloquent
{
	public function product()
	{
		return $this->has_one('Product');
	}

	public function type()
	{
		return $this->belongs_to('MediumType');
	}
}