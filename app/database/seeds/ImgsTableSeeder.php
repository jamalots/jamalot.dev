<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ImgsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        for($i=1; $i<=100; $i++)
        {
        	$img = new img();
        	$img->img = $faker->imageUrl($width = 640, $height = 480, $category = 'animals');
        	$img->user_id = User::all()->random(1)->id;
        	$img->save();
        }
	}

}