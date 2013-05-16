<?php

/**
* 
*/
class OrderDetail extends Eloquent
{
	public function order()
	{
		return $this->belongs_to('Order');
	}

	public function detailtype()
	{
		return $this->belongs_to('OrderDetailType')
	}
}