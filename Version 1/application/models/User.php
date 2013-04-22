<?php

/**
* 
*/
class User extends Eloquent
{
	public function details()
	{
		return $this->has_many('UserDetil', 'user_id');
	}
}