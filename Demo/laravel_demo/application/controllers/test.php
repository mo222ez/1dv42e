<?php

class Test_Controller extends Base_Controller {

	public function action_index()
	{
		$user = User::find('1');
		/*$userdetails = $user->details;
		$detailtype = UserDetailType::get();*/

		$context = array(
			'user' => $user
		);

		return View::make('test.index', $context);
	}

}