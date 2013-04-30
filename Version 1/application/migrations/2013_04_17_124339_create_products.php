<?php

class Create_Products {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table){
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->string('articlenr');
			$table->integer('category_id')->unsigned();
			$table->timestamps();

			$table->foreign('category_id')->references('id')->on('categories')->on_delete('restrict');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}