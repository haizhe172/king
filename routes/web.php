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








































































	Route::group(['prefix'=>'ad'],function(){
		Route::get("create","admin\AdController@create");

	});














	//广告位
	Route::group(['prefix'=>'position'],function(){
		Route::get("create","admin\PositionController@create");//添加视图
		Route::post("store","admin\PositionController@store");//执行添加
		Route::get("index","admin\PositionController@index");//列表页
		Route::get("del/{position_id?}","admin\PositionController@destroy");//删除
		Route::get("edit/{position_id}","admin\PositionController@edit");//修改视图
		Route::post("update/{position_id}","admin\PositionController@update");//执行修改


	});






});

Route::group(['prefix'=>'/'],function(){
	Route::group(['prefix'=>'chat'],function(){
		Route::get("chat","index\ChatController@chat");
		Route::get("user","index\ChatController@user");
	});
});
