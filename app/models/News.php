<?php

class News extends Eloquent {

	protected $table = "news";

	protected $fillable = array('title','body','imageUrl','fileName');

	protected $hidden = array('id','updated_at');

	public static $rules = array(
		'title' => 'required',
		'body'  => 'required',
		//'image' => 'required|mimes:jpg,jpeg,png,JPG,JPEG,PNG'
	);
}
