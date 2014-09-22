<?php

class Realestate extends \Eloquent {
	protected $fillable = [];

	protected $table = 'realestates';

	public static $rules = array(
		'streetNumber'=>'required',
		'streetName'=>'required',
		'streetSufix'=>'required',
		'suburb'=>'required',	
		'postcode'=>'required',	
		'state'=>'required'
		);

	public function realestateimage()
	{
		return $this->hasMany('RealestateImage','realestateId');
	}
	
	public function realestatereview()
	{
		return $this->hasMany('RealestateReview','realestateId');
	}
	public function users()
	{
		return $this->belongsTo('User', 'id');
	}
}