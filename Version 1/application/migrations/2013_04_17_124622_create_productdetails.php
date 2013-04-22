<?php

class Create_Productdetails {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productdetails', function($table){
			$table->increments('id');
			$table->string('value');
			$table->integer('product_id');
			$table->integer('detailtype_id');
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
		Schema::drop('productdetails');
	}

}