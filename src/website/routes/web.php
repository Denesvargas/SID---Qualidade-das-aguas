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

Route::get('/', 'NavigationController@index')->name('navigation.index');
Route::get('/mapa', 'NavigationController@mapa')->name('navigation.index');

Route::get('/dados', 'DataController@index')->name('api.index');

Route::match(array('GET','POST'), '/pesquisa', 'DataController@search')->name('api.search');
