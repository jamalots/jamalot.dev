<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ImgsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        for($i=1; $i<=200; $i++)
        {
        	$img = new Img();
        	$img->img = $faker->imageUrl($width = 640, $height = 480, $category = 'animals');
                $img->description = $faker->sentence($nbWords = 4);
        	$img->user_id = User::all()->random(1)->id;
        	$img->save();
        }
	}

}