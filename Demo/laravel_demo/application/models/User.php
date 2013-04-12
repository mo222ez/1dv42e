<?php
	
/**
* 
*/
class User extends Eloquent
{
	public function details()
	{
		return $this->has_many('UserDetail', 'user_id');
	}
}

?>