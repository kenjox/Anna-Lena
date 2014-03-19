<?php

namespace Anna\Files;

use Illuminate\Support\ServiceProvider;

class FilesServiceProvider extends ServiceProvider{

	/*
		Called automatically by laravel
	 */
	
	public function register()
	{
		$this->app->bind(
			'Anna\Files\FilesInterface',
			'Anna\Files\FilesImpl'
		);
	}
}