<?php

class Create_Media {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function($table){
			$table->increments('id');
			$table->string('name');
			$table->integer('product_id')->unsigned();
			$table->integer('mediatype_id')->unsigned();
			$table->timestamps();

			$table->foreign('product_id')->references('id')->on('products')->on_delete('cascade');
			$table->foreign('mediatype_id')->references('id')->on('mediatypes')->on_delete('restrict');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('media', function ($table)
		{
			$table->drop_foreign('media_product_id_foreign');
			$table->drop_foreign('media_mediatype_id_foreign');
		});
		Schema::drop('media');
	}

}