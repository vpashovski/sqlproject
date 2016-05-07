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

Route::get('/', ['as' => 'index', function () {
    return view('welcome');
}]);

Route::auth();

Route::group(['prefix' => 'car'], function() {
    Route::get('in',       ['as' => 'car.in_garage',     'uses' => 'CarController@inGarage']);
});

Route::resource('car', 'CarController');

Route::resource('owner', 'OwnerController');

Route::resource('image', 'ImageController');

Route::group(['prefix' => 'home'], function() {
    Route::get('',       ['as' => 'home',     'uses' => 'HomeController@index']);
});

Route::group(['prefix' => 'other'], function() {
    Route::get('procedure',       ['as' => 'other.procedure',     'uses' => 'OtherActionController@storedProcedure']);
    Route::get('image/used',     ['as' => 'other.image.query',   'uses' => 'OtherActionController@getUsedImages']);
});

Route::group(['prefix' => 'logs'], function() {
    Route::get('',       ['as' => 'log.index',     'uses' => 'LogController@index']);
});

//Redirect everything other to the index page
Route::any('{any}', function() {
    return redirect()->route('index');
})->where('any', '.*');
