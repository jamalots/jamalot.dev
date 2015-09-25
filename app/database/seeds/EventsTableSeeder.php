<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

// class EventsTableSeeder extends Seeder {

// 	public function run()
// 	{
// 		$faker = Faker::create();

// 		foreach(range(1,1000) as $index)
// 		{
// 			Event::create([

// 			]);
// 		}
// 	}

// }

use Faker\Factory as Faker;
class EventsTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker::create();
        for($i=1; $i<=20; $i++)
        {
            $event = new Event();
            $event->date = $faker->dateTimeBetween($startDate = 'now', $endDate = '3 months');
            $event->description = $faker->realText;
            $event->price = $faker->numberBetween($min = 1, $max = 100);
            $event->start_time = $faker->time($format = 'H:i:s', $min = 'now');
            $event->venue = "Tycoon Flats";
            $event->venue_site = "flatsisback.com";
            $event->address = "2926 N. St. Marys Street";
            $event->city = "San Antonio";
            $event->state = "TX";
            $event->zip = "78212";
            $event->img = $faker->imageUrl($width = 640, $height = 480); // 'http://lorempixel.com/640/480/'
            $event->cover_img = $faker->imageUrl($width = 1103, $height = 363);
            $event->user_id = User::all()->random(1)->id;
            
            $event->save();
        }
    }
}