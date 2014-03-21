<?php

use Anna\Tracks\TracksInterface;


class TracksController extends BaseController {

	

	protected $track;

	public function __construct(TracksInterface $track)
	{
		$this->track = $track;
	}


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

			$trackName = $this->track->addTrack('track');

			$trackPath = URL::to('/').'/uploads/tracks/'.$trackName;

			$tracks->trackUrl = $trackPath;
			$tracks->trackName = $trackName; 
			
			$tracks->save();

			return Redirect::route('tracks.create')->withSuccess('Track added successfully!');
		}
	}



	public function displayList()
	{
		$tracks = Track::orderBy('created_at','DESC')->get();

		return View::make('admin.tracks.listTracks',compact('tracks'));
	}

	public function edit($trackId)
	{
		$track = Track::findOrFail($trackId);

		return View::make('admin.tracks.edit',compact('track'));
	}

	public function update($trackId)
	{
		$rules = array(
			'title' => 'required',
		);

		$validation = Validator::make(Input::all(), $rules);

		if($validation ->fails())
		{
			return Redirect::back()->withErrors($validation->messages()->all())->withInput();
		}
		else
		{
			$track = Track::findOrFail($trackId);

			$track->title = Input::get('title');

			if (Input::hasFile('track') ) 
			{
				//Removes previous track
				$this->track->removeTrack($track->trackName);

				//Update with new track

				$trackName = $this->track->addTrack('track');  // uploads the file and returns file name for saving to DB

				$imagePath = URL::to('/').'/uploads/tracks/'.$trackName;
				$track->trackUrl = $imagePath;
				$track->trackName = $trackName;

			}


			$track->save(); 

			return Redirect::route('tracks.edit',$trackId)->withSuccess('Track updated successfully!!');
		}
	}

	public function destroy($trackId)
	{
		$track = Track::findOrFail($trackId);

		$trackName = $track->trackName;

		//Remove file from DB
		//Then remove from server folder
		
		if( $track->delete() )
		{
			$this->track->removeTrack($trackName);
		}


		return Redirect::route('tracks');
	}

	

}
