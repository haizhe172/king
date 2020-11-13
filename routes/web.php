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















































































































	//快报
    Route::group(['prefix'=>'news'],function(){
        //添加快报
        Route::get('create', function () {
            return view('admin.news.create');
        });
        Route::post("/create/do","admin\NewsController@createdo");
        Route::get("/index","admin\NewsController@index");
        Route::get("/del/{id}","admin\NewsController@del");
        Route::get("/upd/{id}","admin\NewsController@upd");
        Route::post("/upd/do","admin\NewsController@updo");
    });
});


Route::group(['prefix'=>'/'],function(){
	Route::group(['prefix'=>'chat'],function(){
		Route::get("chat","index\ChatController@chat");
		Route::get("user","index\ChatController@user");
	});
});
