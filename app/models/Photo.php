<?php

class Photo extends Eloquent {
	
	protected $fillable = array('imageUrl','caption');

	protected $hidden = array('id','updated_at','created_at');

	public static $rules = array(
		'photo' => 'required'
	);
}
