<?php
namespace Anna\Images;

interface ImagesInterface {
	
	/**
	 * Uploads file to server
	 * @param  string $fieldName 
	 * @return string  filename
	 */
	
	public function saveFile($fieldName);

	/**
	 * Removes file from server
	 * @param  string $filePath path to file in the server
	 * @return null       
	 */
	
	public function removeFile($filePath);
}