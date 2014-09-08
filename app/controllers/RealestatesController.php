<?php

class RealestatesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /realestates
	 *
	 * @return Response
	 */
	public function index()
	{	
		$realestates = Realestate::orderBy('created_at', 'Desc')->paginate(5);
		return View::make('realestates.index')
			->with('realestates', $realestates);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /realestates/create
	 *
	 * @return Response
	 */
	public function create()
	{
		

		return View::make('realestates.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /realestates
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		//Reflection::export(new ReflectionClass('Reales')); exit(); 

		$v = Validator::make($input, Realestate::$rules);
		
		if ($v->passes())
		{
			$realestate = new RealEstate;

			$realestate->id = Input::get('id');
			$realestate->streetNumber = Input::get('streetNumber');
			$realestate->unitNumber = Input::get('unitNumber');
			$realestate->streetName = Input::get('streetName');
			$realestate->streetSufix = Input::get('streetSufix');
			$realestate->houseType = Input::get('houseType');
			$realestate->suburb = Input::get('suburb');
			$realestate->postcode = Input::get('postcode');
			$realestate->state = Input::get('state');
			$realestate->save();

			// Save into Real Estate Image table
			$realestateimage = new RealEstateImage;

			
			if (Input::hasFile('fileName')){
				$file= Input::file('fileName');
				$destinationPath = public_path().'/img/';
				$filename        = str_random(6).'_'.$file->getClientOriginalName();
        				$uploadSuccess   = $file->move($destinationPath, $filename);
				$realestateimage->fileName = $filename;
			}
			
			$realestateimage->realestateId = $realestate->id;
			$realestateimage->save();

			// Save into Real Estate Review table
			$realestatereview = new RealEstateReview;

			$realestatereview->realestateId = $realestate->id;
			$realestatereview->contractStart = Input::get('contractStart');			
			$realestatereview->contractEnd = Input::get('contractEnd');
			$realestatereview->realEstate = Input::get('realestate');
			$realestatereview->cost = Input::get('cost');
			$realestatereview->reason = Input::get('reason');
			$realestatereview->comment = Input::get('comment');
			$realestatereview->reviewDate = date('d / m / Y');
			$realestatereview->save();


			return Redirect::route('realestates.index'); 
		}

		return Redirect::to('realestates/create')->withErrors($v);
	
	}



	/**
	 * Display the specified resource.
	 * GET /realestates/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /realestates/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /realestates/{id}
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
	 * DELETE /realestates/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}