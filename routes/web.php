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

Route::get('/','PagesController@home');
Route::get('/search','PagesController@search');
Route::post('/search','PagesController@subDomainQuery');
Route::post('/query','PagesController@home2');
Route::get('/digWeb','AnalyticsController@digView');
Route::get('/digWeb','AnalyticsController@dig');
Route::get('/chartView','AnalyticsController@chartView');
Route::get('/chartData','AnalyticsController@chartData');

Route::get('/chartData2','AnalyticsController@chartData2');


Route::get('/index','PagesController@index');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::get('/support','HomeController@support');
    // Route::resource('products','ProductController');
});

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

