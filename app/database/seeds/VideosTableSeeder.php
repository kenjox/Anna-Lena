<?php

class VideosTableSeeder extends Seeder {

	public function run()
	{
		 DB::table('videos')->truncate();

		$videos = array(
			array(
				'title' => 'Artificial Love',
				'videoUrl' => 'http://www.youtube.com/watch?v=2UAvpHaFass'
			),
			array(
				'title' => 'Joy',
				'videoUrl' => 'http://www.youtube.com/watch?v=hFXfR9efCEk'
			),
			array(
				'title' => 'Book of love',
				'videoUrl' => 'http://www.youtube.com/watch?v=dkL_kxq2R1s'
			),
			array(
				'title' => 'On a train',
				'videoUrl' => 'http://www.youtube.com/watch?v=HxMyhGFpWjE'
			),
			array(
				'title' => 'Face on the wall',
				'videoUrl' => 'http://www.youtube.com/watch?v=bMQhHWBK0IM'
			),
			array(
				'title' => 'The rage',
				'videoUrl' => 'http://www.youtube.com/watch?v=h7_Th7QFMcw'
			),
			array(
				'title' => 'Personal Jesus',
				'videoUrl' => 'http://www.youtube.com/watch?v=dW2Six0YHGk'
			),
			array(
				'title' => 'Winter Million Miles',
				'videoUrl' => 'http://www.youtube.com/watch?v=ZQDF3Bo2kIM'
			),
			array(
				'title' => 'Come and get me',
				'videoUrl' => 'http://www.youtube.com/watch?v=VUX87B1i_Eo'
			),
			array(
				'title' => 'Faith',
				'videoUrl' => 'http://www.youtube.com/watch?v=ccQs07-NtJA'
			),
			array(
				'title' => 'Winter Million Miles',
				'videoUrl' => 'http://www.youtube.com/watch?v=ZQDF3Bo2kIM'
			),
		);

		
		DB::table('videos')->insert($videos);
	}

}
