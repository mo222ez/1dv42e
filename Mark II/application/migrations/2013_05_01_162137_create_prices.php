<?php

class Create_Prices {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function($table){
			$table->increments('id');
			$table->decimal('value', 15, 2);
			$table->integer('product_id')->unsigned();
			$table->integer('pricetype_id')->unsigned();
			$table->timestamps();

			$table->foreign('product_id')->references('id')->on('products')->on_delete('cascade');
			$table->foreign('pricetype_id')->references('id')->on('pricetypes')->on_delete('restrict');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prices', function ($table)
		{
			//$table->drop_foreign('products_product_id_foreign');
			$table->drop_foreign('prices_pricetype_id_foreign');
		});
		Schema::drop('prices');
	}

}