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
			$table->string('user_name')->nullable();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('email')->unique();
			$table->string('location')->nullable();
			$table->string('instrument')->nullable();
			$table->string('fb_link')->nullable();
			$table->string('level')->nullable();
			$table->string('original')->nullable();
			$table->string('industry_role')->nullable();
			$table->string('password');
			$table->string('genre')->nullable();
			$table->string('img')->nullable();
			$table->string('cover_img')->nullable();
			$table->text('music')->nullable();
			$table->string('about')->nullable();
			$table->boolean('teacher')->nullable();



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
