<?php

class Seed_Categories {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		/*DB::table('categories')->insert(array(
			array('name' => 'Data'),
			array('name' => 'Kontor'),
			array('name' => 'TV och Bild'),
			array('name' => 'Telefon'),
			array('name' => 'Foto')
		));*/

		DB::table('categories')->insert(array(
			array('name' => 'Amerikanskt Godis'),			
			array('name' => 'Choklad'),			
			array('name' => 'Gelé Godis'),
			array('name' => 'Godis som ser ut som mat'),
			array('name' => 'Hårda Karameller'),			
			array('name' => 'Klubbor'),
			array('name' => 'Kolor'),
			array('name' => 'Pulver Godis'),
			array('name' => 'Tuggummi')			
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