<?php

class TracksController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tracks = Track::orderBy('created_at','DESC')->get();

        if ( $tracks ) 
        {
        	return Response::json(array(

        		'tracks' => $tracks->toArray()

        	),200);
        }
	}

	public function create()
	{
		return View::make('admin.tracks.create');
	}

	
	public function store()
	{
		$validation = Validator::make(Input::all(),Track::$rules);

		if ( $validation->fails() ) 
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		else
		{	

			$tracks  = new Track();

			$tracks->title = Input::get('title');
			$tracks->artist = Config::get('app.ARTIST_NAME');

			if (Input::hasFile('track') ) 
			{
				$file = Input::file('track');
				
				$fileOriginalName = str_replace(' ', '', $file->getClientOriginalName());

				$fileName = time().'-'.$fileOriginalName;

				$destination = public_path().'/uploads/tracks/';

				$file->move($destination,$fileName);

				$trackPath = URL::to('/').'/uploads/tracks/'.$fileName;

				$tracks->trackUrl = $trackPath;
			}
			else{
				$tracks->trackUrl = Input::get('trackUrl');
			}

			
			$tracks->save();

			return Redirect::route('tracks.create')->withSuccess('Track added successfully!');
		}
	}



	public function displayList()
	{
		return View::make('admin.tracks.listTracks');
	}

	

}
