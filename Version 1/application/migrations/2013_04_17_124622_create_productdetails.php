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
			$table->integer('product_id')->unsigned();
			$table->integer('detailtype_id')->unsigned();
			$table->timestamps();

			$table->foreign('product_id')->references('id')->on('products')->on_delete('cascade');
			$table->foreign('detailtype_id')->references('id')->on('productdetailtypes');
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