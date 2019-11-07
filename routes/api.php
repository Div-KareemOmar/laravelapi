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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');

});

Route::prefix('elwarsha')->group(function () {
    Route::get('category','api\elwarsha\categoryController@index');
    Route::post('category','api\elwarsha\categoryController@store');
    Route::get('item','api\elwarsha\itemController@index');
    Route::post('item','api\elwarsha\itemController@store');

});

Route::prefix('lolibook')->group(function () {
    Route::get('category','api\lolibook\categoryController@index');
    Route::post('category','api\lolibook\categoryController@store');
    Route::get('item','api\lolibook\itemController@index');
    Route::post('item','api\lolibook\itemController@store');

});

Route::prefix('matager')->group(function () {
    Route::get('category','api\matager\categoryController@index');
    Route::post('category','api\matager\categoryController@store');
    Route::get('item','api\matager\itemController@index');
    Route::post('item','api\matager\itemController@store');

});

Route::prefix('petsstore')->group(function () {
    Route::get('category','api\petsstore\categoryController@index');
    Route::post('category','api\petsstore\categoryController@store');
    Route::get('item','api\petsstore\itemController@index');
    Route::post('item','api\petsstore\itemController@store');

});

Route::prefix('sphinxapps')->group(function () {
    Route::get('category','api\sphinxapps\categoryController@index');
    Route::post('category','api\sphinxapps\categoryController@store');
    Route::get('item','api\sphinxapps\itemController@index');
    Route::post('item','api\sphinxapps\itemController@store');
});

Route::prefix('youkal')->group(function () {
    Route::get('category','api\youkal\categoryController@index');
    Route::post('category','api\youkal\categoryController@store');
    Route::get('item','api\youkal\itemController@index');
    Route::post('item','api\youkal\itemController@store');
});
