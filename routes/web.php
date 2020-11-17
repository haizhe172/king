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
	Route::get("login","merchant\LoginController@login");
	Route::get("dologin","merchant\LoginController@dologin");
	Route::get("reg","merchant\LoginController@reg");
	Route::group(['prefix'=>'public'],function(){
		Route::get("head","merchant\IndexController@head");
		Route::get("left","merchant\IndexController@left");
		Route::get("goods","merchant\IndexController@goods");
		Route::get("type","merchant\IndexController@type");
	});
	Route::group(['prefix'=>'goods'],function(){
		Route::get("goods","merchant\GoodsController@goods");
		Route::get("type","merchant\GoodsController@type");
		Route::any("upload","merchant\GoodsController@upload");
	});









	
});

Route::group(['prefix'=>'admin'],function(){
	Route::get("login","admin\LoginController@login");
	Route::get("loginis","admin\LoginController@loginis");
});
Route::middleware("rolemenu")->prefix('admin')->group(function(){
	Route::get("/","admin\IndexController@index")->name("admin.index");
	Route::get("/home","admin\IndexController@home")->name("admin.home");

	Route::prefix('/brand')->group(function(){
		Route::any('/create','admin\BrandController@create')->name('brand.create');//品牌添加
		Route::any('/store','admin\BrandController@store')->name('brand.store');//执行品牌添加
		Route::any('/index','admin\BrandController@index')->name('brand.index');//品牌展示
		Route::any('/upd','admin\BrandController@upd')->name('brand.upd');//品牌修改视图
		Route::any('/updDo','admin\BrandController@updDo')->name('brand.updDo');//品牌执行修改
		Route::any('/jd','admin\BrandController@jd')->name('brand.jd');//即点即改
		Route::any('/del','admin\BrandController@del')->name('brand.del');//删除
		Route::any('/bdels','admin\BrandController@bdels')->name('brand.dels');//批量删除
	  });
























































	//秒杀商品表
	Route::group(['prefix'=>'seckill'],function(){
		Route::get("create","admin\SeckillController@create");
		Route::post("store","admin\SeckillController@store");//执行添加
		Route::get("indexs","admin\SeckillController@indexs");
		Route::get("del","admin\SeckillController@destroy");//删除
		Route::get("edit","admin\SeckillController@edit");//修改视图
		Route::post("update","admin\SeckillController@update");//执行修改

	});














	//广告 
	Route::group(['prefix'=>'ad'],function(){
		Route::get("create","admin\AdController@create")->name("ad.create");
		Route::post("store","admin\AdController@store")->name("ad.store");//执行添加
		Route::get("index","admin\AdController@index")->name("ad.index");//列表页
		Route::get("del","admin\AdController@destroy")->name("ad.del");//删除
		Route::get("edit","admin\AdController@edit")->name("ad.edit");//修改视图
		Route::post("update","admin\AdController@update")->name("ad.update");//执行修改

	});








	//广告位
	Route::group(['prefix'=>'position'],function(){
		Route::get("create","admin\PositionController@create")->name("position.create");//添加视图
		Route::post("store","admin\PositionController@store")->name("position.store");//执行添加
		Route::get("index","admin\PositionController@index")->name("position.index");//列表页
		Route::get("del/{position_id?}","admin\PositionController@destroy")->name("position.del");//删除
		Route::get("edit","admin\PositionController@edit")->name("position.edit");//修改视图
		Route::post("update","admin\PositionController@update")->name("position.update");//执行修改
		Route::get("show","admin\PositionController@show")->name("position.show");//查看广告

	});
























	//快报
    Route::group(['prefix'=>'news'],function(){
        //添加快报
        Route::get('create', function () {
            return view('admin.news.create');
        })->name("admin.create");
        Route::post("/create/do","admin\NewsController@createdo")->name("admin.create.do");
        Route::get("/index","admin\NewsController@index")->name("admin.index");
        Route::get("/del","admin\NewsController@del")->name("admin.del");
        Route::get("upd","admin\NewsController@upd")->name("admin.upd");
        Route::post("/upd/do","admin\NewsController@updo")->name("admin.updDo");
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
	//优惠券
	Route::group(['prefix'=>'coupon'],function(){
		Route::get("create","admin\CouponController@create")->name("coupon.create");
		Route::get("sousuo","admin\CouponController@sousuo")->name("coupon.sousuo");
		Route::get("updsou","admin\CouponController@updsou")->name("coupon.updsou");
		Route::post("store","admin\CouponController@store")->name("coupon.store");
		Route::get("index","admin\CouponController@index")->name("coupon.index");
		Route::get("ajaxNames","admin\CouponController@ajaxNames")->name("coupon.ajaxNames");
		Route::get("upd","admin\CouponController@upd")->name("coupon.upd");
		Route::any("updDo","admin\CouponController@updDo")->name("coupon.updDo");
		Route::any("del","admin\CouponController@del")->name("coupon.del");
	});
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
