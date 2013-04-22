<?php

class Create_Orderdetails {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderdetails', function($table){
			$table->increments('id');
			$table->string('value');
			$table->integer('order_id');
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
		Schema::drop('orderdetails');
	}

}