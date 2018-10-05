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

Route::get('/', function () {
	return redirect()->intended("trang-chu");
});

Route::group(["prefix"=>"/"], function(){

	Route::get("trang-chu", "homepageController@getIndex")->name("index");

	Route::get("chi-tiet/{id}", "homepageController@getRoomDetail")->name("detail");

	Route::get("dang-nhap", "homepageController@getLoginUser")->name("loginUser");

	Route::get("dang-ky", "homepageController@getRegister")->name("registerUser");

	Route::get("tat-ca", function(){
		return view('homepage.allrooms');
	})->name("allrooms");

	Route::get("thong-tin", function(){
		if(Auth::user())
			return view('homepage.profile');
		else 
			return redirect()->intended("dang-nhap");
	})->name("profile");

	Route::get("danh-sach", "homepageController@getListNews")->name("listnews");

	Route::get("error", function(){
		return view('error.404');
	})->name("error404");

	Route::post("postLoginUser", "homepageController@postLoginUser")->name("postLoginUser");

	Route::post("postLogoutUser", "homepageController@postLogoutUser")->name("postLogoutUser");

	Route::post("postNews", "homepageController@postNews")->name("postNews");

	Route::get("dang-tin", "homepageController@getPostNews")->name("getPostNews");

	Route::post("postRegisterUser", "homepageController@postRegisterUser")->name("postRegisterUser");

	Route::post("changePass", "homepageController@changePass")->name("changePass");
});
