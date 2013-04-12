<?php

class Create_Userdetailtypes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userdetailtypes', function ($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		DB::table('userdetailtypes')->insert(array(
		    'name'  => 'namn'
		));

		DB::table('userdetailtypes')->insert(array(
		    'name'  => 'stad'
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userdetailtypes');
	}

}