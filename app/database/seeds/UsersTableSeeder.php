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
        for($i=1; $i<=20; $i++)
        {
            $user = new User();
            $user->user_name = $faker->sentence($nbWords = 2);
			$user->first_name = $faker->firstName;
			$user->last_name = $faker->lastName;
			$user->email = $faker->email;
			$user->location = $faker->word;
			$user->instrument = $faker->word;
			$user->fb_link = $faker->url;
			$user->level = $faker->word;
			$user->original = $faker->word;
			$user->industry_role = $faker->word;
			$password = $faker->password;
			$user->password = $password;
			if($i%2 == 0){
				$user->user_type = 'band';
			}else{
				$user->user_type = 'musician';
			}
			$user->genre = $faker->word;
			$user->img = $faker->imageUrl($width = 640, $height = 480);
			$user->about = $faker->realText;
			$user->save();
        }
	}
}