<?php
 use Faker\Factory as Faker;
class PhotosTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('photos')->truncate();

		foreach(range(1,20) as $index )
		{
			$faker = Faker::create();

			$photos = Photo::create([
				'imageUrl' => $faker->imageUrl(640,1136),
				'caption'  => $faker->sentence(6)
			]);
		}
		
	}

}
