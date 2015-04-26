<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
		return View::make('api.docs')->with([
			'page_name'	=>	"HOME"
		]);
	}

	public function register()
	{
		return View::make('api.request_key')->with([
		       'page_name' => "REGISTER"
		]);
	}

	public function about(){
	  // probably good to move the about from the api and change this call -tt
	  return View::make('api.about') -> with(['page_name' => "ABOUT"]);
	}

	public function postRegister()
	{
		$email = Input::get('email');
		// verify that $email is an email
		$validator = Validator::make(
		  [
		    'email' => $email
		  ],
		  [
		    'email' => 'required|email'
		  ]
		);
		if($validator -> fails())
		  return Redirect::route('register') -> withErrors($validator) -> withInput(Input::all());
		// send email address to Heroku
		// generate email message with key and send to user
		// display
		// how can i send the $email variable here?
		return View::make('api.key_sent') -> with(['page_name' => "KEYSENT",
							   'email' => $email]);
	}
}
