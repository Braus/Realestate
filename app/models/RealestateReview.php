<?php

class RealEstateReview extends Eloquent {

	protected $table ='realestatereview';
	protected $guarded = ['id'];


	public function realestate()
	{
		return $this->belongsTo('Realestate');
	}
}