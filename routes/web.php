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
    return view('welcome');
});

Auth::routes(); // 登录\注册\找回密码

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register/data', 'HomeController@registerInfo'); // 0.1
Route::post('/user/info', 'UserController@getUserInfo'); // 0.1

Route::post('/lord/policy', 'LordController@policy'); // 0.1

Route::get('/building/list', 'BuildingController@buildingList'); // 0.1
Route::post('/building/detail', 'BuildingController@detail'); // 0.1
Route::post('/building/build', 'BuildingController@build'); // 0.1
Route::post('/building/demolish', 'BuildingController@demolish'); // 0.1
