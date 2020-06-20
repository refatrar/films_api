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
Route::post('signup', 'AuthController@signup');
Route::post('signin', 'AuthController@signin');
Route::get('films', 'FilmController@index');
Route::get('films/{slug}', 'FilmController@show');
Route::post('films', 'FilmController@store');
Route::get('static-data', 'StaticController@getAll');


//
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('comments', 'FilmController@comment');
});
