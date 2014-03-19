<?php

class TracksTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('tracks')->truncate();

		$tracks = array(

			 array(
				 'title'      => "Titanium",
				 'artist'     => "David Guetta",
				 'trackUrl'   => "http://kenjox.se/backup/api/musics/david-guetta-titanium.mp3"
			    ),
			    
			    array(
				 'title'      => "Fox",
				 'artist'     => "Ylvis",
				 'trackUrl'   => "http://kenjox.se/backup/api/musics/fox.mp3"
			    ),
			    
			     array(
				 'title'      => "Monster",
				 'artist'     => "Rihana",
				 'trackUrl'   => "http://kenjox.se/backup/api/musics/monster-rihana.mp3"
			    ),	
			    
			     array(
				 'title'      => "Super Bass",
				 'artist'     => "Niki Minaj",
				 'trackUrl'   => "http://kenjox.se/backup/api/musics/niki-minaj---super-bass.mp3"
			    ),
			    
			     array(
				 'title'      => "Turn up",
				 'artist'     => "Chris Brown",
				 'trackUrl'   => "http://kenjox.se/backup/api/musics/turn-up-music.mp3"
			    ),
			    
			     array(
				 'title'      => "23",
				 'artist'     => "Miley Cyrus",
				 'trackUrl'   => "http://kenjox.se/backup/api/musics/23.mp3"
			    )
			     
		);
		
		DB::table('tracks')->insert($tracks);
		

	}

}
