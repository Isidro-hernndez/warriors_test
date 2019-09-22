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
Route::post('/apiLogin', 'ApiTokenController@update')->name('apiLogin');
Route::post('/apiRegister', 'ApiTokenController@register')->name('apiRegister');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('battles/getAll', 'BattleController@getAll');  
    Route::post('battles', 'BattleController@store');
    Route::post('apiLogout', 'ApiTokenController@logout');
});


Route::apiResources([
    'warriors' => 'API\WarriorController',
    // 'battles' => 'BattleController',
    // 'posts' => 'PostController'
]);


