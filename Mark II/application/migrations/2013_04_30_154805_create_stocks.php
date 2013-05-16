<?php

class Create_Stocks {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks', function($table){
			$table->increments('id');
			$table->string('value');
			$table->integer('product_id')->unsigned();
			$table->timestamps();

			$table->foreign('product_id')->references('id')->on('products')->on_delete('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stocks');
	}

}