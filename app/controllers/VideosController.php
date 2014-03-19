<?php

class VideosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $videos = Video::orderBy('created_at','DESC')->get();

        if ( $videos ) 
        {
        	return Response::json(array(

        		'videos' => $videos->toArray()
        		
        	),200);
        }
	}

	public function create()
	{
		return View::make('admin.videos.create');
	}


	public function store()
	{
		$validation = Validator::make(Input::all(),Video::$rules);

		if ($validation->fails() ) {
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		else
		{
			Video::create(array(
				'title' => Input::get('title'),
				'videoUrl' => Input::get('videoUrl')
			));

			return Redirect::route('videos.create')->withSuccess('Video added successfully!');
		}
	}


	public function displayList()
	{
		return View::make('admin.videos.listVideos');
	}

	

}
