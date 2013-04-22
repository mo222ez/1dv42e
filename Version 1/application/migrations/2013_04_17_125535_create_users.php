<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function ($table)
		{
			$table->increments('id');
			$table->string('email', 254);
			$table->string('password', 64);
			$table->boolean('is_admin');
			$table->timestamps();
		});

		DB::table('users')->insert(array(
		    'email'  => 'admin@admin.com',
		    'password'  => Hash::make('admin')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}