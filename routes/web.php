<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/top', function () {
    return view('top');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'diary'], function() {
    Route::get('create', 'App\Http\Controllers\TopController@add')->middleware('auth');
    Route::get('edit', 'App\Http\Controllers\TopController@edit');
    Route::post('creare', 'App\Http\Controllers\TopController@create');
    Route::get('index', 'App\Http\Controllers\TopController@index')->middleware('auth');
    Route::post('edit', 'App\Http\Controllers\TopController@update')->middleware('auth');
    Route::get('delete', 'App\Http\Controllers\TopController@delete')->middleware('auth');
});

Route::group(['prefix' => 'profile'], function() {
    Route::get('create', 'App\Http\Controllers\ProfileController@add')->middleware('auth');
    Route::get('edit/{id}', 'App\Http\Controllers\ProfileController@edit')->middleware('auth');
    Route::post('creare', 'App\Http\Controllers\ProfileController@create')->middleware('auth');
    Route::post('create', 'App\Http\Controllers\ProfileController@update');
    Route::get('index', 'App\Http\Controllers\ProfileController@index')->middleware('auth');//プロフィールの表示
});