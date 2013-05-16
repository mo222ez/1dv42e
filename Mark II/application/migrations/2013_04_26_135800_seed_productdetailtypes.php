<?php

class Seed_Productdetailtypes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('productdetailtypes')->insert(array(
			//array('name' => 'Pris (exkl. moms)'),
			//array('name' => 'Inköpspris (enkl. moms)'),
			//array('name' => 'Lager'),
			array('name' => 'Vikt')
			//array('name' => 'Moms')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//DB::query('TRUNCATE TABLE productdetailtypes');
	}

}