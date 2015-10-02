<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AdsTableSeeder extends Seeder {

	public function run()
	{
		$this->createFakerAd();
	}
	
	protected function createFakerAd()
	{
		$faker = Faker::create();

		$adtype = array("Informal Jam","Formal Jam/Practice/Rehearsal", "Payed Gig", "Offering Lessons", "Wanting Lessons");
		$level = array("Beginner", "Intermediate", "Semi-Pro", "Professional");
		$original = array("Originals", "Covers", "Both");
		$venuetype = array("House", "Venue", "Recording Studio", "Event");
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
		  
		$instrument = array("Full Band, Acoustic Guitar", "Classical Guitar", "Electric Guitar", "Steel Guitar",
		 "Electric Bass", "Double Bass", "Ukelele", "Piano", "Keyboard", "Organ", "Accordion", 
		 "Drums", "Lead Rock/Pop Vocals", "Lead Jazz Vocals", "Bass Singer", "Baritone Singer", 
		 "Tenor Singer", "Alto Singer", "Mezzo-Soprano Singer", "Soprano Singer", "Cello", "Viola", 
		 "Violin", "Fiddle", "Banjo", "Harp", "Mandolin", "Trumpet", "Trombone", "Tuba", 
		 "French Horn", "Alto Sax", "Tenor Sax", "Flute", "Oboe", "Clarinet", "Harmonica", "Piccolo", 
		 "Bassoon");

		$equipment = array("P/A System", "Guitar Amp", "Bass Amp", "Drum Set", "Keyboard");

        for($i=1; $i<=200; $i++)
        {
            $ad = new Ad;
	        $ad->ad_type = $faker->randomElement($adtype);
	        $ad->ad_need = implode(", ", $faker->randomElements($instrument, $count = rand(1,3)));
	        $ad->ad_title = $faker->state . " " . $faker->lastName;
	        $ad->level = $faker->randomElement($level);
	        $ad->comp = rand(0,200);
	        $ad->genre = implode(", ", $faker->randomElements($genre, $count = rand(1,3)));
			$ad->date = $faker->dateTimeBetween($startDate = 'now', $endDate = '3 months');
	        $ad->start_time = $faker->time($format = 'H:i:s', $min = 'now');
	        $ad->description = $faker->realText;
	        $ad->equipment = implode(", ", $faker->randomElements($equipment, $count = rand(0,5)));
	        $ad->venue_type = $faker->randomElement($venuetype);
	        $ad->venue = "Tycoon Flats";
	        $ad->address = "2926 N. St. Marys Street";
	        $ad->city = "San Antonio";
	        $ad->state = "TX";
	        $ad->zip_code = "78212";
	        $ad->user_id = User::all()->random(1)->id;
			$ad->ad_img = $faker->imageUrl($width = 640, $height = 480, $category = 'nightlife');
			$ad->save(); 

            
        }
    }    

}