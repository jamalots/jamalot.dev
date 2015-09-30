<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

// class UsersTableSeeder extends Seeder {

// 	public function run()
// 	{
// 		$faker = Faker::create();

// 		foreach(range(1, 20) as $index)
// 		{
// 			User::create([

// 			]);
// 		}
// 	}

// }

use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder {
	public function run()
	{
		// $this->createNewUser();
		$this->createFakerUser();
	}
	// protected function createNewUser()
	// {
	// 	$user = new User();
	// 	$user->user_name 			 = $_ENV['USER_USER_NAME'];
	// 	$user->first_name 			 = $_ENV['USER_FIRST_NAME'];
	// 	$user->last_name 			 = $_ENV['USER_LAST_NAME'];
	// 	$user->email 				 = $_ENV['USER_EMAIL'];
	// 	$user->location 			 = $_ENV['USER_LOCATION'];
	// 	$user->instrument 			 = $_ENV['USER_INSTRUMENT'];
	// 	$user->fb_link 				 = $_ENV['USER_FB_LINK'];
	// 	$user->level 				 = $_ENV['USER_LEVEL'];
	// 	$user->original 			 = $_ENV['USER_ORIGINAL'];
	// 	$user->industry_role 		 = $_ENV['USER_INDUSTRY_ROLE'];
	// 	$user->password 			 = $_ENV['USER_PASS'];
	// 	$user->password_confirmation = $_ENV['USER_PASS'];
	// 	$user->genre 		 		 = $_ENV['USER_GENRE'];
	// 	$user->img 					 = $_ENV['USER_IMG'];
	// 	$user->about 				 = $_ENV['USER_ABOUT'];
		
	// 	if (!$user->save()) {
	// 		var_dump($user);
	// 		dd($user->getErrors()->toArray());
	// 	}
	// }
	protected function createFakerUser()
	{
		$faker = Faker::create();
        for($i=1; $i<=50; $i++)
        {
            $user = new User();
            $user->user_name = $faker->sentence($nbWords = 2) ;
			$user->first_name = $faker->firstName;
			$user->last_name = $faker->lastName;
			$user->email = $faker->email;
			$user->location = $faker->state;
			$user->instrument = $faker->word;
			$user->fb_link = $faker->url;
			if($i%3 == 0){
				$user->level = 'professional';
			}else if ($i%2 == 0){
				$user->level = 'novice';
			} else {
				$user->level = 'intermediate';
			}
			if($i%5 == 0){
				$user->original = 'both';
			}else if ($i%4 == 0){
				$user->original = 'originals';
			} else {
				$user->original = 'covers';
			}
			$user->industry_role = $faker->word;
			$password = 'password';
			$user->password = $password;
			if($i%2 == 0){
				$user->user_type = 'band';
			}else{
				$user->user_type = 'musician';
			}
			if($i%7 == 0){
				$user->teacher = true;
			} else {
				$user->teacher = false; 
			}
			$user->genre = $faker->word;
			$user->music = '<iframe class="player" width="100%" height="300" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/147853477&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe><script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>';
			$user->cover_img = $faker->imageUrl($width = 1103, $height = 363, $category = 'nightlife');
			$user->img = $faker->imageUrl($width = 640, $height = 480, $category = 'people');
			$user->about = $faker->realText;
			$user->save();
        }
	}
}