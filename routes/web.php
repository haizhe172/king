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
		Route::post("store","admin\AdController@store");//执行添加
		Route::get("index","admin\AdController@index");//列表页
		Route::get("del/{position_id}","admin\AdController@destroy");//删除
		Route::get("edit/{position_id}","admin\AdController@edit");//修改视图
		Route::post("update/{position_id}","admin\AdController@update");//执行修改

	});








	//广告位
	Route::group(['prefix'=>'position'],function(){
		Route::get("create","admin\PositionController@create");//添加视图
		Route::post("store","admin\PositionController@store");//执行添加
		Route::get("index","admin\PositionController@index");//列表页
		Route::get("del/{position_id?}","admin\PositionController@destroy");//删除
		Route::get("edit/{position_id}","admin\PositionController@edit");//修改视图
		Route::post("update/{position_id}","admin\PositionController@update");//执行修改
		Route::get("show/{position_id}","admin\PositionController@show");//查看广告

	});
























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







	//管理员
	Route::group(['prefix'=>'admin'],function(){
		Route::get("create","admin\AdminController@create");
		Route::post("store","admin\AdminController@store");
		Route::get("ajaxuniq","admin\AdminController@ajaxuniq");
		Route::get("index","admin\AdminController@index");
		Route::get("ajaxNames","admin\AdminController@ajaxNames");
		Route::get("upd","admin\AdminController@upd");
		Route::any("updDo","admin\AdminController@updDo");
		Route::any("del","admin\AdminController@del");
	});

	//角色
	Route::group(['prefix'=>'role'],function(){
		Route::get("create","admin\RoleController@create");
		Route::post("store","admin\RoleController@store");
		Route::get("ajaxuniq","admin\RoleController@ajaxuniq");
		Route::get("index","admin\RoleController@index");
		Route::get("ajaxNames","admin\RoleController@ajaxNames");
		Route::get("upd","admin\RoleController@upd");
		Route::any("updDo","admin\RoleController@updDo");
		Route::any("del","admin\RoleController@del");
	});
});

Route::group(['prefix'=>'/'],function(){
	Route::group(['prefix'=>'chat'],function(){
		Route::get("chat","index\ChatController@chat");
		Route::get("user","index\ChatController@user");
	});
});
