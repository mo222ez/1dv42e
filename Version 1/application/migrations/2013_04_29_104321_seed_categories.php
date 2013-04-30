<?php

class Seed_Categories {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('categories')->insert(array(
			array('name' => 'Data'),
			array('name' => 'Kontor'),
			array('name' => 'TV och Bild'),
			array('name' => 'Telefon'),
			array('name' => 'Foto')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//DB::query('TRUNCATE TABLE categories');
	}

}