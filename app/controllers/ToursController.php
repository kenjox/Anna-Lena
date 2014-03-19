<?php

class ToursController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tours = Tour::orderBy('created_at','DESC')->get();

        if ( $tours ) 
        {
        	return Response::json(array(

        		'tours' => $tours->toArray()
        		
        	), 200);
        }
	}

	public function create()
	{
		return View::make('admin.tours.create');
	}


	public function store()
	{
		$validation = Validator::make(Input::all(),Tour::$rules);

		if ( $validation->fails() ) 
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		else
		{	

			$tours        = new Tour();
			$tours->title = Input::get('title');
			$tours->body  = Input::get('body');

			if (Input::hasFile('image') ) 
			{
				$file = Input::file('image');

				$fileName = time().'-'.$file->getClientOriginalName();

				$destination = public_path().'/uploads/photos/';

				$file->move($destination,$fileName);

				$imagePath = URL::to('/').'/uploads/photos/'.$fileName;

				$tours->imageUrl = $imagePath;
			} 

			$tours->save();

			return Redirect::route('tours.create')->withSuccess('Tour created successfully!');
		}

	}


	public function displayList()
	{
		return View::make('admin.tours.listTours');
	}

	

}
