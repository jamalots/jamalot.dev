<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUserIdToAdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ads', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned();	
			$table->foreign('user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ads', function(Blueprint $table)
		{
			$table->dropForeign('ads_user_id_foreign');
    		$table->dropColumn('user_id');
		});
	}

}
