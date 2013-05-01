<?php

class Seed_Taxes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('taxes')->insert(array(
			array('value' => 0),
			array('value' => 6),
			array('value' => 12),
			array('value' => 25)
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}