<?php

class Create_Pricetypes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pricetypes', function($table){
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		DB::table('pricetypes')->insert(array(
			array('name' => 'Inköpspris (exkl. moms)'),
			array('name' => 'Pris (exkl. moms)')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pricetypes');
	}

}