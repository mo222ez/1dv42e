<?php

/**
* 
*/
class MediaType extends Eloquent
{
	public function media()
	{
		return $this->has_many('Medium');
	}
}