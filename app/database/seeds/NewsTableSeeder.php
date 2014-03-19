<?php

use Faker\Factory as Faker;

class NewsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
	   
	    DB::table('news')->truncate();

	    foreach(range(1,10) as $index )
	    {
	    	$faker = Faker::create();

	    	$news = News::create([
	    		'title' => $faker->word(),
	    		'body'  => $faker->paragraph(4),
	    		'imageUrl' => $faker->imageUrl
	    	]);
	    }

	}

}
