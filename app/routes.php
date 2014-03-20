<?php



//API for the app
Route::group(array('prefix'=>'api/v1'), function(){
	
	Route::get('tracks','TracksController@index');
	Route::get('tours','ToursController@index');
	Route::get('photos','PhotosController@index');
	Route::get('videos','VideosController@index');
	Route::get('news','NewsController@index');
	Route::get('slides','SliderController@index');
	
	
});



//Route for admin panel

Route::get('login',array('as'=>'users.login','uses'=>'UsersController@getLogin'));
Route::post('login',array('as'=>'users.login','uses'=>'UsersController@postLogin'));
Route::get('logout',array('as'=>'users.logout','uses'=>'UsersController@Logout'));

Route::get('/admin',array('as'=>'admin.dashboard','uses'=>'AdminController@dashboard'))->before('auth');

Route::group(array('prefix'=>'admin','before'=>'auth'), function(){

	//Displays create form for each resource
	Route::get('news/create',array('as'=>'news.create','uses'=>'NewsController@create'));
	Route::get('tours/create',array('as'=>'tours.create','uses'=>'ToursController@create'));
	Route::get('tracks/create',array('as'=>'tracks.create','uses'=>'TracksController@create'));
	Route::get('photos/create',array('as'=>'photos.create','uses'=>'PhotosController@create'));
	Route::get('videos/create',array('as'=>'videos.create','uses'=>'VideosController@create'));
	Route::get('slides/create',array('as'=>'slides.create','uses'=>'SliderController@create'));

	Route::post('news',array('as'=>'news.store','uses'=>'NewsController@store'))->before('csrf');
	Route::post('tours',array('as'=>'tours.store','uses'=>'ToursController@store'))->before('csrf');
	Route::post('tracks',array('as'=>'tracks.store','uses'=>'TracksController@store'));
	Route::post('photos',array('as'=>'photos.store','uses'=>'PhotosController@store'));
	Route::post('videos',array('as'=>'videos.store','uses'=>'VideosController@store'));
	Route::post('slides',array('as'=>'slides.store','uses'=>'SliderController@store'));

	//Displays list form for each resource
	Route::get('news',array('as'=>'news','uses'=>'NewsController@displayList'));
	Route::get('tours',array('as'=>'tours','uses'=>'ToursController@displayList'));
	Route::get('tracks',array('as'=>'tracks','uses'=>'TracksController@displayList'));
	Route::get('photos',array('as'=>'photos','uses'=>'PhotosController@displayList'));
	Route::get('videos',array('as'=>'videos','uses'=>'VideosController@displayList'));
	Route::get('slides',array('as'=>'slides','uses'=>'SliderController@displayList'));

	//Edit routes
	Route::get('news/{newsId}',array('as'=>'news.edit','uses'=>'NewsController@edit'));
	Route::put('news/{newsId}',array('as'=>'news.update','uses'=>'NewsController@update'));

	Route::get('tours/{tourId}',array('as'=>'tours.edit','uses'=>'ToursController@edit'));
	Route::put('tours/{tourId}',array('as'=>'tours.update','uses'=>'ToursController@update'));

	//Delete routes
	Route::delete('news/{newsId}',array('as'=>'news.destroy','uses'=>'NewsController@destroy'));
	Route::delete('tours/{tourId}',array('as'=>'tours.destroy','uses'=>'ToursController@destroy'));


});
