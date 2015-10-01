<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('notification_type');
			$table->integer('notified_id')->unsigned();
			$table->foreign('notified_id')->references('id')->on('users');
			$table->integer('notifier_id')->unsigned();
			$table->foreign('notifier_id')->references('id')->on('users');
			$table->integer('trigger_id')->unsigned()->nullable();
			$table->string('trigger_type')->nullable();
			$table->timestamps();

			$table->index(['trigger_id', 'trigger_type']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notifications');
	}

}
