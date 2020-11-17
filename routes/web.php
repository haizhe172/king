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
//导航栏
    Route::group(['prefix'=>'cate'],function(){
        //导航栏添加
        Route::get("/create","admin\CateController@create");
        Route::post("/create/do","admin\CateController@createdo");
        Route::get("/index","admin\CateController@index");
        Route::get("/del/{id}","admin\CateController@del");
        Route::get("/upda/{id}","admin\CateController@updata");
        Route::post("/upda/do","admin\CateController@updatado");
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
