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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/warriors', 'WarriorController@index')->name('warriors.index');
Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

// Route::get('/admin', function () {
//     return view('warriors.admin');
// })->name('warriors.admin');


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/admin', 'BattleController@index');   
});
Route::get('/test', function (){
    return view('test');
});
