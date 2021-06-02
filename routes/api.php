<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//register
Route::post('/register','Api\AuthController@register');

//login
Route::post('/login','Api\AuthController@login');

//logout
Route::middleware('auth:api')->get('/logout', 'Api\AuthController@logout');

//get data test
Route::middleware('auth:api')->get('/getdata','Api\AuthController@getdata');

Route::get('/auth/{provider}', 'Api\AuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Api\AuthController@handleProviderCallback');

//User Dashboard
Route::middleware('auth:api')->get('/User', 'Api\AuthController@index');

//User profile edit
Route::middleware('auth:api')->get('/UserEdit', 'Api\AuthController@edit');

//User profile update
Route::middleware('auth:api')->post('/UserUpdate', 'Api\AuthController@update');

//View User profile
Route::middleware('auth:api')->get('/Profile{id}', 'Api\AuthController@show');

//View User profile
//Route::middleware('auth:api')->get('/Profile1{name}', 'Api\AuthController@show1');

//View User profile
Route::middleware('auth:api')->get('/BProfile{id}', 'Api\AuthController@bshow');
//View User profile
Route::middleware('auth:api')->get('/CProfile{id}', 'Api\AuthController@cshow');
//View User profile
Route::middleware('auth:api')->get('/QProfile{id}', 'Api\AuthController@qshow');
//View User profile
Route::middleware('auth:api')->get('/AProfile{id}', 'Api\AuthController@ashow');
