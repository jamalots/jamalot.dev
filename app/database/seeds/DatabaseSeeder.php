<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	protected $tables = [

		'users', 'statuses', 'events'
		// 'imgs'

	];

	protected $seeders = [
		'UsersTableSeeder','StatusesTableSeeder','EventsTableSeeder'
		// 'ImgsTableSeeder'

	];

	public function run()
	{
		Eloquent::unguard();

		$this->cleanDatabase();

		foreach($this->seeders as $seedClass)
		{
			$this->call($seedClass);


		}
		
	}

	private function cleanDatabase ()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach($this->tables as $table)
		{
			DB::table($table)->truncate();

		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1');

	}


}
