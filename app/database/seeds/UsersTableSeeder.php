<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('users')->truncate();

		$users = array(
			'email'    => 'anna@winternet.se',
			'password' => Hash::make('winternet.2014')
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
