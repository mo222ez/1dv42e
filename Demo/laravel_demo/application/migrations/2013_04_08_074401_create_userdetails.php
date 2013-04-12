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
			$table->integer('user_id');
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
		Schema::drop('userdetails');
	}

}