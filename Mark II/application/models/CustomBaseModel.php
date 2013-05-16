<?php

/**
* 
*/
class CustomBaseModel extends Eloquent
{
	protected $rules = array();

	protected $errors;

	public $validator;

	public function validate($input)
	{
		$this->validator = Validator::make($input, $this->rules);

		if ($this->validator->fails()) {
			$this->errors = $this->validator->errors;
			//dd($this->validator);
			return false;
		}

		return true;
	}

	public function errors()
	{
		return $this->errors;
	}
}