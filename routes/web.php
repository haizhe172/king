<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'merchant'],function(){
	Route::get("/","merchant\IndexController@index");
});
Route::group(['prefix'=>'admin'],function(){
	Route::get("/","admin\IndexController@index");
});

Route::group(['prefix'=>'/'],function(){
	Route::group(['prefix'=>'chat'],function(){
		Route::get("chat","index\ChatController@chat");
		Route::get("user","index\ChatController@user");
		Route::any("init","index\ChatController@init");
		Route::get("merchant","index\ChatController@merchant");
		Route::any("say","index\ChatController@say");

	});
});
