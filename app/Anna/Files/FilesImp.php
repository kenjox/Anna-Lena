<?php
namespace Anna\Files;

use Anna\Files\FilesInterface;
use Image;
use File;
use Input;

class FilesImpl implements FilesInterface 
{

	/**
	 * Uploads file to server
	 * @param  string $fieldName 
	 * @return string  filename
	 */
	
	public function saveFile($fieldName)
	{
		
		if (Input::hasFile($fieldName) ) 
		{
			$file = Input::file($fieldName);

			$fileName = time().'-'.$file->getClientOriginalName();

			$fileName = str_replace(' ', '', $fileName);

			$destination = $this->photoPath();

			$image = Image::make($file->getRealPath());
			$image->resize(645,null,true);

			File::exists($this->photoPath()) or File::makeDirectory($this->photoPath());

			$image->save($this->photoPath().$fileName);

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