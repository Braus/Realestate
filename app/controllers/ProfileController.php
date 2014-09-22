<?php

class ProfileController extends \BaseController{

	public function index()
	{
		return View::make('layout.dashboard');
	}

	public function userRealestates()
	{
		$id = Auth::user()->id;
		$user = User::find($id)->realestate;
		
		
		//$queries = DB::getQueryLog();
		//$last_query = end($queries);
		

		
		return View::make('admin.realestate')
			->with('user', $user);
		
	}
}