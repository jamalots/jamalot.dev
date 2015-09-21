<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			Event::create([

			]);
		}
	}

}

// use Faker\Factory as Faker;
// class EventsTableSeeder extends Seeder {
//     public function run()
//     {
//         $faker = Faker::create();
//         for($i=1; $i<=40; $i++)
//         {
//             $event = new Event();
//             $event->date = $faker->dateTime;
//             $event->start_time = $faker->time($format = 'H:i:s');
//             $event->venue = "Tycoon Flats";
//             $event->venue_site = "flatsisback.com";
//             $event->zip_code = "78212";
//             $event->city = "San Antonio";
//             $event->img = $faker->imageUrl($width = 640, $height = 480); // 'http://lorempixel.com/640/480/'
//             $event->user_id = User::all()->random(1)->id;
            
//             // $event->save();
//         }
//     }
// }