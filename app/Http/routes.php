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

Route::get('/', 'HomeController@index');
Route::get('/dashboard',function () {
    return view('home');
});
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
Route::post('timein', ['as' => 'time-post', 'uses' => 'SessionsController@postTime']);
Route::post('timeout', ['as' => 'time-out', 'uses' => 'SessionsController@timeout']);
Route::get('report', 'UserlogsController@index');
Route::get('users','UserlogsController@showUsers');
Route::post('adduser', ['as' => 'add-user', 'uses' =>'UserlogsController@addUser']);
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/deleteuser', 'UserlogsController@deleteuser');
Route::post('createuser','UserlogsController@create');
Route::get('userdetails','UserlogsController@edit');
Route::patch('update','UserlogsController@update');
Route::get('excel','UserlogsController@makeExcel');
Route::get('logschart',function () {
    return view('logschart');
});




