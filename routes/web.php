<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::controller(NewsController::class)->prefix('admin')->name('news.')->group(function(){
    Route::get('news/create', 'add')->name('add');
});

Route::prefix('admin')->middleware('auth')->name('profile.')->group(function () {
    Route::get('profile/create', 'Admin\SelfProfileController@add')->name('add');
    Route::post('profile/create', 'Admin\SelfProfileController@create')->name('create');
    Route::get('profile/edit', 'Admin\SelfProfileController@edit')->name('edit');
    Route::post('profile/edit', 'Admin\SelfProfileController@update')->name('update');
    Route::get('profile', 'Admin\SelfProfileController@index')->name('index');
    Route::get('profile/delete', 'Admin\SelfProfileController@delete')->name('delete');
});
