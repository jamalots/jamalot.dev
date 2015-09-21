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
			$table->string('user_name', 255);
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('email')->unique();
			$table->string('password',255);
			$table->string('genre', 255)->nullable;
			$table->string('img')->nullable;
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
