<?php

use Illuminate\Support\Facades\Route;
$url = "App\Http\Controllers";

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
    return view('home');
});

// Route::get('product/{slug}', $url . '\ProductController@showProduct');
// Route::resource('product', $url . '\ProductController');

Route::get('product/edit/{product:product_slug}', $url. '\ProductController@edit');
Route::patch('product/update', $url. '\ProductController@update');

Route::get('product/{slug}', $url. '\ProductController@showProduct');
Route::get('product', $url. '\ProductController@index');

Route::get('tambah', $url. '\ProductController@tambah');
Route::post('product/simpan', $url. '\ProductController@simpan');

Route::delete('product/delete/{product:product_slug}', $url. '\ProductController@delete');
