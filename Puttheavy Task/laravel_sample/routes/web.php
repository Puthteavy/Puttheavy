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
Route::group(['namespace'=>'Article','prefix'=>'article'],function (){

    //============post =================

    Route::get('/article','ArticleController@index');
    Route::get('/create','ArticleController@form');
    Route::get('/article/{id}','ArticleController@show');
    Route::post('/store','ArticleController@store');
    Route::get('/article/{id}/edit','ArticleController@edit');
    Route::patch('/article/{id}','ArticleController@update');
    Route::get('/article/article/{id}','ArticleController@delete');
    //
    //Route::resource('article/','ArticleController');




});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
