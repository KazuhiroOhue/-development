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
Route::group(['middleware' => 'guest'], function(){
    Route::get('/', function () {
        return view('top_page');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('memos/create', 'Admin\MemosController@add');
    Route::post('memos/create', 'Admin\MemosController@create');
    Route::get('memos', 'Admin\MemosController@index');
    Route::get('memos/detail','Admin\MemosController@detail');
    Route::get('memos/edit', 'Admin\MemosController@edit');
    Route::post('memos/edit', 'Admin\MemosController@update');
    Route::get('memos/delete', 'Admin\MemosController@delete');
    Route::get('variety/create', 'Admin\VarietyController@add');
    Route::post('variety/create', 'Admin\VarietyController@create');
    Route::get('variety', 'Admin\VarietyController@index');
    Route::get('variety/detail','Admin\VarietyController@detail');
    Route::get('variety/edit', 'Admin\VarietyController@edit');
    Route::post('variety/edit', 'Admin\VarietyController@update');
    Route::get('variety/delete', 'Admin\VarietyController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

