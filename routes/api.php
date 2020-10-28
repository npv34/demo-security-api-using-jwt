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
Route::prefix('groups')->group(function () {
    Route::get('/', 'GroupController@getAll');
    Route::post('/store', 'GroupController@store');
    Route::get('/{id}', 'GroupController@getById');
    Route::put('/{id}', 'GroupController@edit');
    Route::delete('/{id}/delete', 'GroupController@delete');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'jwt.verify'], function () {
    Route::get('me', 'AuthController@me');
    Route::get('users', 'API\UserController@getAllUser');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
});
