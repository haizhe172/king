<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['domain' => 'api.king.com'], function () {
	Route::get("/","index\api\IndexController@index");
	Route::get("/index/news","index\api\IndexController@news");
	Route::get("/index/newsdesc","index\api\IndexController@newsdesc");
	Route::get("list","index\api\GoodsController@list");
});