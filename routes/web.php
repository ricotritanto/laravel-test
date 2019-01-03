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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//router untuk menu category
Route::group(['prefix' => 'kategori'], function() 
{
    Route::get('/', 'KategoryController@index');
    Route::get('/new', 'KategoryController@create');
    // Route::get('/create', 'KategoryController@createCategory');
    Route::post('/', 'KategoryController@save');
    Route::get('/{id}', 'KategoryController@edit');
    Route::put('/{id}', 'KategoryController@update');
    Route::delete('/{id}', 'KategoryController@delete');
});

Route::group(['prefix' => 'produks'], function()
{
	Route::get('/', 'ProdukController@index');
    Route::get('/new', 'ProdukController@create');

});
