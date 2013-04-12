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

	/*public function detail_name()
	{
		return $detailTypeId = $this->detailtype_id;
		return UserDetailType::find($detailTypeId);
		return $this->belongs_to('UserDetailType');
	}
*/
	public function detailtype()
	{
		return $this->belongs_to('UserDetailType');
	}

	public function detailname()
	{
		return $this->detailtype->name;
	}
}

?>