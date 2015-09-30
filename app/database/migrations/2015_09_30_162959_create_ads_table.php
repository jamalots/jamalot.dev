<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ad_type');
			$table->string('ad_need');
			$table->string('ad_title');
			$table->string('instrument');
			$table->integer('min_players')->nullable();
			$table->integer('max_players')->nullable();
			$table->string('level')->nullable();
			$table->integer('comp')->nullable();
			$table->string('genre')->nullable();
			$table->text('description')->nullable();
			$table->string('date')->nullable();
			$table->string('start_time')->nullable();
			$table->string('end_time')->nullable();
			$table->string('venue_type');
			$table->string('venue');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zip_code');
			$table->string('ad_img')->nullable();
			$table->string('equipment')->nullable();
			
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
		Schema::drop('ads');
	}

}
