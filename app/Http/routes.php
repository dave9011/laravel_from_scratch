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

/*
Route::get('/', function () {

	$people = ['Dave', 'Ashley', 'Luis', 'Josh', 'Abe'];

    return view('welcome', compact('people'));
});

Route::get('about', function(){ 
	// returns a file from out views folder, in this case we have a 
	// folder called "pages" with a file called "about" within in, we
	// can use dot notation or we could do pages/about
	return view('pages.about');
});
*/

//the '@' calls the function 'home' in PagesController
Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/begin', function(){
	//Method 1 to flash:
	//Session::flash('flash_message', 'Method 1 flash message!');
	//Method 2 to flash:
	//session()->flash('flash_message', 'Method 2 flash message!');

	/* We subsitute this for our new global method within our helpers.php: flash()
	session()->flash('flash_message', 'You are now logged in! (not really, this is just for testing)');
	session()->flash('flash_status', 'alert-success');
	*/
	
	flash('You are now logged in! (not really, this is just for testing)', 'alert-success');

	return redirect('/cards');
});

Route::get('/cards', 'CardsController@index');

Route::get('/cards/create', 'CardsController@create');

Route::get('/cards/{card}', 'CardsController@show');

//Handle the POST request from the 'Add Note' button
Route::post('cards/{card}/notes', 'NotesController@store');

Route::get('/notes/{note}/edit', 'NotesController@edit');

Route::patch('/notes/{note}', 'NotesController@update');