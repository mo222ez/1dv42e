<?php

class Create_Taxes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxes', function($table){
			$table->increments('id');
			$table->integer('value');
			$table->timestamps();
		});

		Schema::table('products', function ($table)
		{
			$table->foreign('tax_id')->references('id')->on('taxes')->on_delete('restrict');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products',function ($table)
		{
			$table->drop_foreign('products_tax_id_foreign');
		});
		Schema::drop('taxes');
	}

}