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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/your-list', 'ListitemController@show')->name('yourlist');

Route::post('/your-list', 'ListitemController@add')->name('yourlist.create');

Route::delete('/your-list/{id}', 'ListitemController@delete')->name('yourlist.delete');

Route::get('/your-list/{id}', 'ListitemController@updateShow')->name('yourlist.update_show');
Route::patch('/your-list/{id}', 'ListitemController@updateComplete')->name('yourlist.update_complete');
