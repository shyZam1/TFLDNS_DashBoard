<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

//Route::get('/','PagesController@welcome');
Route::get('/','PagesController@home');
Route::get('/users','PagesController@users');
Route::get('/support','PagesController@support');
Route::get('/index','PagesController@index');

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

Route::post('/editItem', function (Request $request) {

	$rules = array (
			'name' => 'required|alpha',
			'email' => 'required|email',
			'password' => 'required'
		
	);
	$validator = Validator::make ( Input::all (), $rules );
	if ($validator->fails ())
		return Response::json ( array (
		    'errors' => $validator->getMessageBag ()->toArray ()
		) );
	else {

		$data = User::find ( $request->id );
		$data->name = ($request->name);
		$data->email = ($request->email);
		$data->password = ($request->password);
		$data->save ();
		return response ()->json ( $data );
	}
} );
Route::post('/deleteItem', function (Request $request) {
	User::find ( $request->id )->delete ();
	return response ()->json ();
} );