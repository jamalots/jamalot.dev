<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_name');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->unique();
			$table->string('location');
			$table->string('instrument');
			$table->string('fb_link');
			$table->string('level');
			$table->string('original');
			$table->string('industry_role');
			$table->string('password');
			$table->string('genre')->nullable;
			// $table->string('img')->nullable;
			$table->string('about')->nullable;


			$table->rememberToken();

			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
