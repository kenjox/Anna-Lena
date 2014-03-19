<?php

class News extends Eloquent {

	protected $table = "news";

	protected $fillable = array('title','body','imageUrl');

	protected $hidden = array('id','updated_at');

	public static $rules = array(
		'title' => 'required',
		'body'  => 'required'
	);
}
