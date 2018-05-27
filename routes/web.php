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
// User route
Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::put('user/{user}', 'UserController@update')->name('user.update');

//Chat route
Route::get('chat', function(){
    return view('chat');
})->name('chatroom')->middleware('auth');

// Message Route
Route::get('/messages', 'MessageController@index')->middleware('auth');
Route::post('/messages', 'MessageController@store')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
