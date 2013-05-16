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
			$table->integer('order_id')->unsigned();
			$table->integer('detailtype_id')->unsigned();
			$table->timestamps();

			$table->foreign('order_id')->references('id')->on('orders');
			$table->foreign('detailtype_id')->references('id')->on('orderdetailtypes');
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