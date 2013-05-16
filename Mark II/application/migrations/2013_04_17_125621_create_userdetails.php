<?php

class Create_Userdetails {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userdetails', function ($table)
		{
			$table->increments('id');
			$table->string('value');
			$table->integer('user_id')->unsigned();
			$table->integer('detailtype_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade');
			$table->foreign('detailtype_id')->references('id')->on('userdetailtypes');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userdetails');
	}

}