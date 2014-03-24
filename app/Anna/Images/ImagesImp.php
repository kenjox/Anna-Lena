<?php
namespace Anna\Images;

use Anna\Images\ImagesInterface;
use Image;
use File;
use Input;

class ImagesImpl implements ImagesInterface 
{

	/**
	 * Uploads file to server
	 * @param  string $fieldName 
	 * @return string  filename
	 */
	
	public function saveFile($fieldName,$height = 1500)
	{
		
		if (Input::hasFile($fieldName) ) 
		{
			$file = Input::file($fieldName);

			$fileName = time().'-'.$file->getClientOriginalName();

			$fileName = str_replace(' ', '', $fileName);

			$destination = $this->photoPath();

			$image = Image::make($file->getRealPath());
			$image->resize($height,null,true)->crop(1280,992)->resize(640,null,true);

			File::exists($this->photoPath()) or File::makeDirectory($this->photoPath());

			$image->save($this->photoPath().$fileName, 75);

			return $fileName;

		} 
	}

	/**
	 * Removes file from server
	 * @param  string $filePath path to file in the server
	 * @return null       
	 */
	
	public function removeFile($fileName)
	{
		$filePath = $this->photoPath().$fileName;
		
		if( File::exists( $filePath ) )
		{
			File::delete($filePath);
		}
	}

	/**
	 * Helper function specifying file storage path
	 * @return string path to file in server
	 */
	
	private function photoPath()
	{
		return public_path().'/uploads/photos/';

	}
}