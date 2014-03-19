<?php

class Tour extends Eloquent {
	
	protected $fillable = array('title','body','imageUrl');

	protected $hidden = array('id','updated_at');

	public static $rules = array(
		'title' => 'required',
		'body'  => 'required'
	);
}
