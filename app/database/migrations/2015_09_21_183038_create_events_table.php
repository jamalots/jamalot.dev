<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('description');
			$table->string('date');
			$table->integer('price')->nullable();;
			$table->string('start_time');
			$table->string('venue');
			$table->string('venue_site')->nullable();
			$table->string('zip_code');
			$table->string('city');
			$table->string('img')->nullable();;
			$table->string('cover_img')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
