<?php

class SliderController extends BaseController {

	
	//Slides json api
	
	public function index()
	{
		$slides = Slide::orderBy('created_at','DESC')->get();
		
		if( $slides )
        {
        	return Response::json(array(

        		'slides' => $slides->toArray()

        	),200);
        }
       
	}
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function displayList()
	{
        dd("List of slides");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.slides.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), Slide::$rules);
		
		if( $validation->fails() )
		{
			return Redirect::back()->withErrors($validation->messages())->withInput();
		}
		else
		{
			
			
			
			$slides  = new Slide();
		
			if (Input::hasFile('file') ) 
			{
				$file = Input::file('file');
				
				$fileOrginalName = str_replace(' ', '', $file->getClientOriginalName());

				$fileName = time().'-'.$fileOrginalName;

				$destination = public_path().'/uploads/photos/';

				$upload_success = $file->move($destination,$fileName);
				
				if( $upload_success )
				{
					$imagePath = URL::to('/').'/uploads/photos/'.$fileName;

				    $slides->imageUrl = $imagePath;
				
					return Response::json('success', 200);
				}
				else
				{
					return Response::json('error', 400);
				}

				
			} 

			$slides->save();
			
			return Redirect::route('slides.create')->withSuccess('Photo added successfully!');
			


		}
	}
	
	


	
	 
	 
	public function destroy($id)
	{
		//
	}

}
