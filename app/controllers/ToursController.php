<?php

use Anna\Files\FilesInterface; 

class ToursController extends BaseController {

	
	protected $file;

	public function __construct(FilesInterface $file)
	{
		$this->file = $file;

	}


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

			$fileName = $this->file->saveFile('image');

			$imagePath = URL::to('/').'/uploads/photos/'.$fileName;
			$tours->imageUrl = $imagePath;

			$tours->save();


			return Redirect::route('tours.create')->withSuccess('Tour created successfully!');
		}

	}


	public function displayList()
	{
		$tours = Tour::orderBy('created_at','DESC')->get();
		return View::make('admin.tours.listTours',compact('tours'));
	}

	public function edit($tourId)
	{
		$tours = Tour::findOrFail($tourId);

		return View::make('admin.tours.edit',compact('tours'));
	}


	public function update($tourId)
	{
		$rules = array(
			'title' => 'required',
			'body'  =>  'required'
		);

		$validation = Validator::make(Input::all(), $rules);

		if($validation ->fails())
		{
			return Redirect::back()->withErrors($validation->messages()->all())->withInput();
		}
		else
		{
			$tour = Tour::findOrFail($tourId);

			$tour->title = Input::get('title');
			$tour->body = Input::get('body');

			if (Input::hasFile('image') ) 
			{
				//Removes previous photo
				$this->file->removeFile($tour->fileName);

				//Update with new photo

				$fileName = $this->file->saveFile('image');  // uploads the file and returns file name for saving to DB

				$imagePath = URL::to('/').'/uploads/photos/'.$fileName;
				$tour->imageUrl = $imagePath;
				$tour->fileName = $fileName;

			}


			$tour->save(); 

			return Redirect::route('tours.edit',$tourId)->withSuccess('Tours updated successfully!!');
		}
	}

	public function destroy($tourId)
	{

		$tour = Tour::findOrFail($tourId);

		$fileName = $tour->fileName;

		//Remove file from DB
		//Then remove from server folder
		
		if( $tour->delete() )
		{
			$this->file->removeFile($fileName);
		}


		return Redirect::route('tours')->withSuccess("Tours removed successfully!");
	}

	

}
