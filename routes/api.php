<?php

use Illuminate\Http\Request;

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


Route::get('/cats', 'API\CatController@index');
Route::post('/cats', 'API\CatController@store');
Route::get('/cats/{id}', 'API\CatController@show');
Route::patch('/cats/{id}', 'API\CatController@update');
Route::delete('/cats/{id}', 'API\CatController@destroy');