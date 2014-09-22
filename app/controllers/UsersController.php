<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('users.edit');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return View::make('users.edit');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return View::make('layout.landing');
	}
	public function login()
	{
		return View::make('layout.login');
	}
	public function postLogin()
	{
		$input = Input::all();
		
		$rules = array(
			'username' => 'required',
			'password' => 'required'
			);
		$v = Validator::make($input, $rules);

		if($v->fails())
		{
			return Redirect::to('/')->withErrors($v);
		} else {
			$credentials = array('username' => Input::get('username'), 'password' => Input::get('password'));

			if(Auth::attempt($credentials))
			{
				return View::make('layout.dashboard');
			}else{
				return Redirect::to('/')->withErrors('Username or Password incorrect');
			}
		}

		return Redirect::to('login');
	}
	public function register()
	{
		return View::make('layout.register');
	}
	public function postRegister()
	{
		$input = Input::all();

		$v = Validator::make($input, User::$rules);

		if($v->passes())
		{

			$user = New User;

			$user->id 		= Input::get('id');
			$user->username 	= Input::get('username');
			$user->email 		= Input::get('email');
			$user->password 	= Hash::make(Input::get('password'));

			$user->save();

			return Redirect::to('/')->withInput(Input::all());
		}
		return View::make('layout.register')->withErrors($v);
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	//Form in the Real Estate page.
	public function contactingUser($id)
	{	
		
		$thisRe = Realestate::with('users')->find($id);
		$thisUser = User::find($thisRe->user_id);

		$input = Input::all();

		$rules = array(
			'nameUser' 	=>	'required|min:3',
			'emailUser'	=>	'required|email',
			'commentUser'	=>	'required'
			);

		$v = Validator::make($input, $rules);

		if ($v->fails())
		{
			return Redirect::back()
				->withErrors($v);
		}

		$mailMessage = array(
			'nameUser' => Input::get('nameUser'),
			'emailUser' => Input::get('emailUser'),
			'commentUser' => Input::get('commentUser')
		);

		
		Mail::send('emails.usertouser', $mailMessage, function($message) use ($thisUser){
			$message
				->to($thisUser->email, 'test')
				->from(Input::get('emailUser'))
				->Subject(Input::get('nameUser').' from Real Estate ');
			
		});

		Session::flash('succes', 'Email Sent');

		return Redirect::back();
	}
}