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

/* 首页，登录注册、展示当前系统数据 */
Route::get('/', 'OutsideController@index');
Route::get('/index', 'OutsideController@index');
Route::post('/index-data', 'OutsideController@indexData');
Route::post('/login', 'OutsideController@login');
Route::post('/register', 'OutsideController@register');

/* 领地，展示所有领地的基本资料 */
Route::get('/manor/index', 'ManorController@index');
Route::post('/manor/index-data', 'ManorController@indexData');

/* 建筑，展示某个领地上存在的建筑物（及其摆放） */
Route::get('/manor/building', 'BuildController@index');
Route::post('/manor/building-data/{id}', 'BuildController@indexData');
Route::post('/manor/build', 'BuildController@build');
Route::post('/manor/demolish', 'BuildController@demolish');

/* 军队，展示驻扎在每个领地的每支军队 */
Route::get('/manor/army', 'ArmyController@index');
Route::post('/manor/army-data/{id}', 'ArmyController@indexData');
Route::post('/manor/employ', 'ArmyController@employ');
Route::post('/manor/dismiss', 'ArmyController@dismiss');

/* 地图，入侵支援、展示全局地图 */
Route::get('/mapping/world', 'MappingController@index');
Route::post('/mapping/world-data/{xAxis}/{yAxis}', 'MappingController@indexData');
Route::post('/mapping/assault', 'MappingController@assault');
Route::post('/mapping/support', 'MappingController@support');

//Auth::routes();
