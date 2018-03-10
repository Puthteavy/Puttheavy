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
Route::get('/product', function (){
   return 'Product test';
});
Route::get('/product/{id}',function ($id){
    return 'Product id is '.$id;
});
//multiple param
Route::get('/product/{id}/{name}/{qty}',function($id,$name,$qty){
   return 'Product id : '.$id.'<br>Product Name : '.$name.'<br>Product QTY : '.$qty;
});
Route::get('/home-view', function (){
    return view('admin.user.index');
});
Route::get('/url',function (){
    return view('layout.front');
});
// create route url with controller
Route::get('/index','HomeController@index');
Route::get('/about','HomeController@about');

//homeview
Route::get('/home',function (){
    return view('admin.admin_template.index');
});
//web view
Route::get('/url', function (){
    return view('admin.web.index');
});

//Route::get('/article','ArticleController@index');
//Route::get('/article/create','ArticleController@create');
//
//Route::get('/article/{id}','ArticleController@show');
//Route::post('/article','ArticleController@store');

////create for all route from controller
/// it's auto create route from controller can work with (create, edit, deleted, update)

Route::resource('article','ArticleController');

//display data in route
Route::get('/greeting', function () {
    return view('template.about', ['name' => 'Samantha']);
});

