<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return view('form');
});

Route::post('/', function(){
	

	//We first define the form validation rules
	$rules = array('link' => 'required|url');

	//then we run form validation
	$validation = Validator::make(Input::all(), $rules);

	if($validation->fails())
	{

		return Redirect::to('/')
		->withInput()
		->withErrors($validation);

	}
	else
	{
		//check if this exits in the database
		$link = App\Link::where('url', '=', Input::get('link'))
		->first();
		//add to database if not found

		//If we find the link in the database redirect them
		if($link){
			return redirect('/')
			->withInput( array( 'link'=> url( $link->hash ) ) );
			
		}
		else
		{
			//creat a new hash
			do{
				$newHash = str_random(6);
			} while(App\Link::where('hash', '=', $newHash)->count() > 0);

			App\Link::create(array(
				'url' => Input::get('link'),
				'hash' => $newHash

				));

				return redirect('/')
				->withInput( array( 'link'=> url( $newHash ) ) );

		}

	}
});

Route::get('{hash}', function($hash){
		//var_dump($hash);die();
		//check if hash is from a url in our database
		$link = App\Link::where('hash', '=', $hash)->first();
		if($link) 
		{
			return Redirect::to($link->url);
		}
		else 
		{
			return Redirect::to('/')
			->with('message', 'Invalid Link');
		}
})->where('hash', '[0-9a-zA-Z]{6}');