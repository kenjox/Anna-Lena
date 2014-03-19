<?php

class PhotosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $photos = Photo::orderBy('created_at','DESC')->get();

        if ( $photos ) {
        	
        	return Response::json(array(

        		'photos' => $photos->toArray()

             ),200);
        }
        
	}

	public function create()
	{
		return View::make('admin.photos.create');
	}


	public function store()
	{
		$validation = Validator::make(Input::all(),Photo::$rules);

		if ( $validation->fails() ) 
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		else
		{	

			$photos  = new Photo();
			
			if (Input::hasFile('photo') ) 
			{
				$file = Input::file('photo');

				$fileName = time().'-'.$file->getClientOriginalName();

				$destination = public_path().'/uploads/photos/';

				$file->move($destination,$fileName);

				$imagePath = URL::to('/').'/uploads/photos/'.$fileName;

				$photos->imageUrl = $imagePath;
			} 

			$photos->caption = Input::get('caption');

			$photos->save();

			return Redirect::route('photos.create')->withSuccess('Photo added successfully!');
		}
	}


	public function displayList()
	{
		return View::make('admin.photos.listPhotos');
	}

	

}
