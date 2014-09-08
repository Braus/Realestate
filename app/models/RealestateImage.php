<?php

class RealEstateImage extends Eloquent {

	protected $table ='realestateimage';
	protected $guarded = ['id'];


	public function realestate()
	{
		return $this->belongsTo('Realestate');
	}
}