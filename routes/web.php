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

use Entity\Migrations;

Route::get('/', function () {

    return view('home');
});

Auth::routes();
Route::resource('users', 'UserController');

Route::group(['middleware' => ['web', 'auth']], function () {

});

Route::get('test-broadcast', function(){
    broadcast(new \App\Events\ExampleEvent);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('files', 'FileController');
Route::post('files/test', 'FileController@test')->name('files.test');
