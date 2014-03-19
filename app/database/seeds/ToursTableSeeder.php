<?php

use Faker\Factory as Faker;

class ToursTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
	   
	    DB::table('tours')->truncate();

	    foreach(range(1,10) as $index )
	    {
	    	$faker = Faker::create();

	    	$tours = Tour::create([
	    		'title' => $faker->sentence(2),
	    		'body'  => $faker->paragraph(4),
	    		'imageUrl' => $faker->imageUrl
	    	]);
	    }

	}

}
