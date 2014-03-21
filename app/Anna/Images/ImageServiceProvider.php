<?php

namespace Anna\Images;

use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider{

	/*
		Called automatically by laravel
	 */
	
	public function register()
	{
		$this->app->bind(
			'Anna\Images\ImagesInterface',
			'Anna\Images\ImagesImpl'
		);
	}
}