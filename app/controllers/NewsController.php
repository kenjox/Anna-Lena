<?php

use Anna\Images\ImagesInterface; 

class NewsController extends BaseController {

	
	protected $file;

	public function __construct(ImagesInterface $file)
	{
		$this->file = $file;
	}


	public function index()
	{
        $news = News::orderBy('created_at','DESC')->get();

        if( $news )
        {
        	return Response::json(array(

        		'news' => $news->toArray()

        	),200);
        }
       
	}

	
	public function create()
	{
		return View::make('admin.news.create');
	}


	public function store()
	{
		

		$validation = Validator::make(Input::all(),News::$rules);

		if ( $validation->fails() ) 
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		else
		{	

			$news        = new News();
			$news->title = Input::get('title');
			$news->body  = Input::get('body');

			$fileName = $this->file->saveFile('image');  // uploads the file and returns file name for saving to DB

			$imagePath = URL::to('/').'/uploads/photos/'.$fileName;
			$news->imageUrl = $imagePath;
			$news->fileName = $fileName;

			$news->save();

			return Redirect::route('news.create')->withSuccess('News created successfully!');

		}
	}

	public function photoPath()
	{
		return public_path().'/uploads/photos/';

	}


	public function displayList()
	{
		$news = News::orderBy('created_at','ASC')->get();
		return View::make('admin.news.listNews',compact('news'));
	}

	public function edit($newsId)
	{
		$news = News::findOrFail($newsId);

		return View::make('admin.news.edit',compact('news'));
	}

	public function update($newsId)
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
			$news = News::findOrFail($newsId);

			$news->title = Input::get('title');
			$news->body = Input::get('body');

			if (Input::hasFile('image') ) 
			{
				//Removes previous photo
				$this->file->removeFile($news->fileName);

				//Update with new photo

				$fileName = $this->file->saveFile('image');  // uploads the file and returns file name for saving to DB

				$imagePath = URL::to('/').'/uploads/photos/'.$fileName;
				$news->imageUrl = $imagePath;
				$news->fileName = $fileName;

			}


			$news->save(); 

			return Redirect::route('news.edit',$newsId)->withSuccess('News updated successfully!!');
		}


	}

	public function destroy($newsId)
	{
		
		$news = News::findOrFail($newsId);

		$fileName = $news->fileName;

		//Remove file from DB
		//Then remove from server folder
		
		if( $news->delete() )
		{
			$this->file->removeFile($fileName);
		}


		return Redirect::route('news')->withSuccess("News removed successfully!");

	}   

	

}
