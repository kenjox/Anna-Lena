<?php

class Slide extends Eloquent {
	
	protected $guarded = array();

	public static $rules = array(
		'imageUrl' => 'required|mimes:jpg,jpeg,png'
	);
}
