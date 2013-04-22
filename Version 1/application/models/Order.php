<?php

/**
* 
*/
class Order extends Eloquent
{
	public function details()
	{
		return $this->has_many('OrderDetail', 'order_id');
	}
}