<?php
namespace Anna\Tracks;

use Anna\Tracks\TracksInterface;
use Input;
use File;

class TracksImpl implements TracksInterface {

	public function addTrack($fieldName)
	{
		if (Input::hasFile($fieldName) ) 
		{
			$file = Input::file($fieldName);
			
			$fileOriginalName = str_replace(' ', '', $file->getClientOriginalName());

			$fileName = time().'-'.$fileOriginalName;

			$destination = $this->trackPath();

			File::exists($this->trackPath()) or File::makeDirectory($this->trackPath());

			$file->move($destination,$fileName);

			return $fileName;

			
		}
	}

	public function removeTrack($fileName)
	{
		$filePath = $this->trackPath().$fileName;
		
		if( File::exists( $filePath ) )
		{
			File::delete($filePath);
		}
	}

	private function trackPath()
	{
		return public_path().'/uploads/tracks/';
	}


}
