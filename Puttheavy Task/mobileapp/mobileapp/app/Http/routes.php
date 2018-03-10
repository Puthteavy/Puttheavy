<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login',['uses' => 'Usercontroller@postLogin','as' => 'login']);

Route::get('/logout', ['uses' => 'Usercontroller@postLogout','as' => 'logout']);

Route::get('/search', 'controller@getSearch');

Route::get('/khmer','controller@getJson');

Route::get('/english', 'controller@getEnglish');

Route::get('/drink', 'controller@getDrink');

Route::group(['middleware' => ['CheckAdmin']], function(){

    Route::get('/dashboard', 'controller@getDashboard');

    Route::get('/dashboard/createPage','controller@createPage');

    Route::get('/formcontent', ['uses' => 'controller@getFormcontent','as' => 'formcontent']);

    Route::post('/savecontent', 'controller@saveContent');

    Route::delete('/delete/{id}', 'controller@getDelete');

    Route::put('/update/{id}',['uses' => 'controller@getUpdate','as' => 'update']);

    Route::patch('/saveupdatecontent', 'controller@postUpdate');

    //post category
    Route::get('/postcategory','controller@getCategory');

});


//Route::group(['middleware' => ['web']], function () {
//
//    Route::post('/login',['uses' => 'Usercontroller@postLogin','as' => 'login']);
//
//    Route::get('/logout', ['uses' => 'Usercontroller@postLogout','as' => 'logout']);
//
//    Route::get('/khmer','controller@getJson');
//
//    Route::get('/english', 'controller@getEnglish');
//
//    Route::get('/drink', 'controller@getDrink');
//
//    Route::get('/dashboard', ['uses' => 'controller@getDashboard','as' => 'dashboard','middleware' => 'auth']);
//
//    Route::get('/formcontent', ['uses' => 'controller@getFormcontent','as' => 'formcontent','middleware' => 'auth']);
//
//    Route::post('/savecontent', 'controller@saveContent');
//
//    Route::delete('/delete/{id}', 'controller@getDelete');
//
//    Route::put('/update/{id}',['uses' => 'controller@getUpdate','as' => 'update','middleware' => 'auth']);
//
//    Route::patch('/saveupdatecontent', 'controller@postUpdate');
//
//});


