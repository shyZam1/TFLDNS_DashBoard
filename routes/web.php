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

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

/*Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

//Route::get('/','PagesController@welcome');
Route::get('/','PagesController@home');
Route::get('/users','PagesController@users');
Route::get('/support','PagesController@support');
Route::get('/index','PagesController@index');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    // Route::resource('products','ProductController');
});

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

