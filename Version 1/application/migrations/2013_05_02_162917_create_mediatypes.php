<?php

class Create_Mediatypes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mediatypes', function($table){
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		DB::table('mediatypes')->insert(array(
			array('name' => 'image')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mediatypes');
	}

}