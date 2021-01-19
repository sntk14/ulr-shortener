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


Route::get('/links','Shorter\LinkController@index')->name('links.index');
Route::get('/link','Shorter\LinkController@create')->name('links.create');
Route::post('/link','Shorter\LinkController@store')->name('links.store');
Route::delete('/link/{id}','Shorter\LinkController@destroy')->name('links.delete');

Route::get('/author','Shorter\PageController@aboutCreatorPage')->name('author');

Route::get('/{short_url}','Shorter\PageController@redirect')->name('redirect');
Route::get('/','Shorter\PageController@index')->name('index');
