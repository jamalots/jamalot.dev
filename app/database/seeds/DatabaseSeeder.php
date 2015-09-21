<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		DB::table('events')->delete();
		DB::table('users')->delete();
		// DB::table('imgs')->delete();
		$this->call('UsersTableSeeder');
		$this->call('EventsTableSeeder');
		// $this->call('ImgsTableSeeder');
		// $this->call('UserTableSeeder');
	}

}
