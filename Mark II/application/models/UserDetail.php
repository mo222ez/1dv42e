<?php

/**
* 
*/
class UserDetail extends Eloquent
{
	public function user()
	{
		return $this->belongs_to('User');
	}

	public function detailtype()
	{
		return $this->belongs_to('UserDetailType');
	}
}