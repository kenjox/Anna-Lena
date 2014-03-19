<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('NewsTableSeeder');
		$this->call('ToursTableSeeder');
		$this->call('VideosTableSeeder');
		$this->call('PhotosTableSeeder');
		$this->call('TracksTableSeeder');
		$this->call('UsersTableSeeder');
	}

}