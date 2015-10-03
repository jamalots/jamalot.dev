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

		$password = 'password';
		$level = array("Beginner", "Intermediate", "Semi-Pro", "Professional");
		$original = array("Originals", "Covers", "Both");
		$usertype = array("Band", "Musician");
		$genre = array("Acoustic Blues", "Electric Blues", "Bluegrass", "Classical", "Pop Country", 
			"Traditional Country", "House", "Deep House", "Dubstep", "Trap", "Techno", "Downtempo", 
			"Ambient", "Drums & Bass", "Video Game", "Americana", "Acoustic Folk", "Cajun Folk", 
			"Celtic Folk", "Singer/Songwriter Folk", "Combo Jazz", "Dixieland Jazz", "Ensemble Jazz", 
			"Fusion Jazz", "Latin Jazz", "Standards", "Acid Jazz", "Latin", "New Age", "Ambient", 
			"Christian", "Classic Rock", "Dance", "Hard Rock", "Heavy Metal", "Indie Rock", 
			"Latin Rock", "New Wave", "Pop", "Psychedelic", "Punk Rock", "Rock & Roll", "Rockabilly", 
			"Singer/Songwriter", "Ska", "Soft Rock", "Southern Rock", "Top 40", "Hip Hop/Rap", 
			"Classic Soul", "Neo-Soul", "Gospel", "Contemporary R&B", "Reggae", "Soundtrack", 
			"World Music");
		  
		$instrument = array("Acoustic Guitar", "Classical Guitar", "Electric Guitar", "Steel Guitar",
		 "Electric Bass", "Double Bass", "Ukelele", "Piano", "Keyboard", "Organ", "Accordion", 
		 "Drums", "Lead Rock/Pop Vocals", "Lead Jazz Vocals", "Bass Singer", "Baritone Singer", 
		 "Tenor Singer", "Alto Singer", "Mezzo-Soprano Singer", "Soprano Singer", "Cello", "Viola", 
		 "Violin", "Fiddle", "Banjo", "Harp", "Mandolin", "Trumpet", "Trombone", "Tuba", 
		 "French Horn", "Alto Sax", "Tenor Sax", "Flute", "Oboe", "Clarinet", "Harmonica", "Piccolo", 
		 "Bassoon");

		

        for($i=1; $i<=50; $i++)
        {
            $user = new User();
            $user->user_name = $faker->firstName . rand(10,50);
			$user->first_name = $faker->firstName;
			$user->last_name = $faker->lastName;
			$user->band_name = $faker->lastName;
			$user->email = $faker->email;
			$user->location = array_rand(Config::get('states'));
			$user->instrument = implode(", ", $faker->randomElements($instrument, $count = rand(1,3)));
			$user->fb_link = $faker->url;
			$user->level = $faker->randomElement($level);
			$user->original = $faker->randomElement($original);
			$user->password = $password;
			$user->user_type = $faker->randomElement($usertype);
			$user->teacher = $faker->boolean($chanceOfGettingTrue = 50); // true
			$user->genre = implode(", ", $faker->randomElements($genre, $count = rand(1,5)));
			$user->music = '<iframe class="player" width="100%" height="300" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/147853477&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe><script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>';
			$user->cover_img = $faker->imageUrl($width = 1103, $height = 363, $category = 'nightlife');
			$user->img = $faker->imageUrl($width = 640, $height = 480, $category = 'people');
			$user->about = $faker->realText;
			$user->save();
        }
	}
}