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
		$returnMessage = Communication::requestKey($email);
		$parsedKey = json_decode($returnMessage);

		if(property_exists($parsedKey, 'key'))
		{
			// generate email message with key and send to user
			Mail::send('emails.auth.apikey', array('key' => $parsedKey->key), function($message) use ($email)
			{
				$message->to($email, 'Api user')->subject('Kairos API Key');
			});
			// display
			return View::make('api.key_sent') -> with(['page_name' => "KEYSENT",
							   'email' => $email, 'key' => $parsedKey->key]);
		}
		return Redirect::route('register') -> withErrors($validator) -> withInput(Input::all()) -> with('global', 'Email is already in use or an error occured with the server');	
	}

	public function exampleAPI()
	{
		$json = Input::get('json');
		$json = str_replace(array("\n", "\r"), '', $json);
		$mode = Input::get('mode');

		if(!$json || !$mode)
		{
			return Response::json(['error' => 'Could not make the requests using the supplied input'], 500);
		}

		$data = Communication::runExample($mode, $json);
		return Response::json(['success' => "Recieved a response from the solver", 'data' => $data], 200);
	}
}
