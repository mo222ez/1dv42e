<?php

class Create_Orderdetailtypes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderdetailtypes', function($table){
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orderdetailtypes');
	}

}