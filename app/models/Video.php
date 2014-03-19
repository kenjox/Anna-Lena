<?php

class Video extends Eloquent {
	
	protected $fillable = array('title','videoUrl');

	protected $hidden = array('id','updated_at','created_at');

	public static $rules = array(
		'title' =>'required',
		'videoUrl' => 'required|url'
	);
}
