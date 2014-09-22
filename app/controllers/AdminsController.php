<?php

class AdminsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admins
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Auth::user()->id;
		$user = User::find($id)->realestate;
		
		
		//$queries = DB::getQueryLog();
		//$last_query = end($queries);
		//print_r($last_query); exit;

		return View::make('admins.index')
			->with('user', $user);;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admins/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admins
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$id = Auth::user()->id;
		$re = User::find($id)->realestate;
		//$re = Realestate::find($user_id);
		//$user = User::find($re->user_id);
		
		// $queries = DB::getQueryLog();
		// $last_query = end($queries);
		// print_r($last_query); exit;
		
		return View::make('admins.show')
			->with('realestate', $re);
			//->with('user', $user);
	}
	/**
	 * Show the form for editing the specified resource.
	 * GET /admins/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($username, $id)
	{
		$re = Realestate::find($id);
		$reImage = Realestate::find($id)->realestateImage;
		 $queries = DB::getQueryLog();
		$last_query = end($queries);
		echo '<pre>';
		print_r($reImage); 
		echo '</pre>';
		//exit;

		return View::make('admins.edit')
			->with('realestate', $re)
			->with('realestateImage', $reImage);

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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