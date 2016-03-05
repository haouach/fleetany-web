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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('home', 'HomeController@index');
Route::resource('/contact', 'HomeController@contact');

Route::resource('modelsensor', 'ModelSensorController');
Route::resource('modelmonitor', 'ModelMonitorController');
Route::resource('modelvehicle', 'ModelVehicleController');
Route::resource('modeltire', 'ModelTireController');
Route::resource('typevehicle', 'TypeVehicleController');
Route::resource('user', 'UserController');

Route::get('user/destroy/{id}', 'UserController@destroy');

Route::get('profile', 'UserController@showProfile');

Route::put('updateProfile/{id}', 'UserController@updateProfile');

Route::bind(
    'users',
    function ($value, $route) {
        return App\User::whereId($value)->first();
    }
);

Route::controllers(
    [
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
    ]
);
