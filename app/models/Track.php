<?php

class Track extends Eloquent {
	
	protected $fillable = array('title','artist','trackUrl');

	protected $hidden = array('id','updated_at','created_at');

	public static $rules = array(
		'title' => 'required'
	);
}
