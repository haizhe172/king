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
	Route::get("login","admin\LoginController@login");
	Route::get("loginis","admin\LoginController@loginis");
});
Route::middleware("rolemenu")->prefix('admin')->group(function(){
	Route::get("/","admin\IndexController@index")->name("admin.index");
	Route::get("/home","admin\IndexController@home")->name("admin.home");















































































































	//快报
    Route::group(['prefix'=>'news'],function(){
        //添加快报
        Route::get('create', function () {
            return view('admin.news.create');
        })->name("admin.create");
        Route::post("/create/do","admin\NewsController@createdo")->name("admin.create.do");
        Route::get("/index","admin\NewsController@index");
        Route::get("/del","admin\NewsController@del");
        Route::get("upd","admin\NewsController@upd");
        Route::post("/upd/do","admin\NewsController@updo");
    });







	//管理员
	Route::group(['prefix'=>'admin'],function(){
		Route::get("create","admin\AdminController@create")->name("admin.create");
		Route::post("store","admin\AdminController@store")->name("admin.store");
		Route::get("ajaxuniq","admin\AdminController@ajaxuniq")->name("admin.ajaxuniq");
		Route::get("index","admin\AdminController@index")->name("admin");
		Route::get("ajaxNames","admin\AdminController@ajaxNames")->name("admin.ajaxNames");
		Route::get("upd","admin\AdminController@upd")->name("admin.upd");
		Route::any("updDo","admin\AdminController@updDo")->name("admin.updDo");
		Route::any("del","admin\AdminController@del")->name("admin.del");
	});

	//角色
	Route::group(['prefix'=>'role'],function(){
		Route::get("create","admin\RoleController@create")->name("role.role");
		Route::post("store","admin\RoleController@store")->name("role.create");
		Route::get("ajaxuniq","admin\RoleController@ajaxuniq")->name("role.ajaxuniq");
		Route::get("index","admin\RoleController@index")->name("role.index");
		Route::get("ajaxNames","admin\RoleController@ajaxNames")->name("role.ajaxNames");
		Route::get("upd","admin\RoleController@upd")->name("role.upd");
		Route::any("updDo","admin\RoleController@updDo")->name("role.updDo");
		Route::any("del","admin\RoleController@del")->name("del");
		Route::any("role","admin\RoleController@role")->name("role");
		Route::any("roleDo","admin\RoleController@roleDo")->name("roleDo");
	});
	//权限
	Route::group(['prefix'=>'menu'],function(){
		Route::get("create","admin\MenuController@create")->name("menu.create");
		Route::post("store","admin\MenuController@store")->name("menu.store");
		Route::get("ajaxuniq","admin\MenuController@ajaxuniq")->name("menu.ajaxuniq");
		Route::get("index","admin\MenuController@index")->name("menu.index");
		Route::get("ajaxNames","admin\MenuController@ajaxNames")->name("menu.ajaxNames");
		Route::get("upd","admin\MenuController@upd")->name("menu.upd");
		Route::any("updDo","admin\MenuController@updDo")->name("menu.updDo");
		Route::any("del","admin\MenuController@del")->name("menu.del");
		Route::any("menu","admin\MenuController@menu")->name("menu.menu");
		Route::any("menuDo","admin\MenuController@menuDo")->name("menu.menuDo");
	});
});

Route::group(['prefix'=>'/'],function(){
	Route::group(['prefix'=>'chat'],function(){
		Route::get("chat","index\ChatController@chat");
		Route::get("user","index\ChatController@user");
	});
});
