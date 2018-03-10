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
Route::get('/test',function(){
    return view('test.test_jq');
});
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){

    //============post =================

  Route::get('/post','PostController@index');
  Route::get('/post-form','PostController@form');
  Route::put('/post-edit','PostController@edit');
  Route::post('/post-save','PostController@save');
  Route::put('/post-delete','PostController@delete');




});
