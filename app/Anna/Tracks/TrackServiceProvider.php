<?php
namespace Anna\Tracks;

use Illuminate\Support\ServiceProvider;

class TrackServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Anna\Tracks\TracksInterface',
			'Anna\Tracks\TracksImpl'
		);
	}
}