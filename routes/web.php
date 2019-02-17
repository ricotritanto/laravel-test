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
    return view('admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('test');
// Route::get('/admin', 'HomeController@index')->name('admin');

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
    Route::post('/', 'ProdukController@save');    
    Route::get('/{id}', 'ProdukController@edit');   
    Route::put('/{id}', 'ProdukController@update');
    Route::delete('/{id}', 'ProdukController@delete');
});

Route::group(['prefix' => 'transaction'], function()
{
    Route::get('/', 'TransactionController@index');
    Route::get('/new', 'TransactionController@create');
    Route::post('/cari', 'TransactionController@cari');
    Route::post('/tambah', 'TransactionController@tambah');
    Route::get('/ext', 'TransactionController@ext');
});

Route::group(['prefix' => 'stok'], function()
{
    Route::get('/', 'stokController@index');
    Route::get('/new', 'TransactionController@create');
    Route::post('/cari', 'TransactionController@cari');
    Route::post('/tambah', 'TransactionController@tambah');
    Route::get('/ext', 'TransactionController@ext');
});