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
    return view('welcome');
});

// Route::get('product/{slug}', $url . '\ProductController@showProduct');
// Route::resource('product', $url . '\ProductController');

Route::get('product/{slug}', $url. '\ProductController@showProduct');
// All Product
Route::middleware(['auth:sanctum', 'verified'])->get('product', $url. '\ProductController@index');

// Edit
Route::get('product/edit/{product:product_slug}', $url. '\ProductController@edit');
Route::patch('product/update', $url. '\ProductController@update');

// Create
Route::get('tambah', $url. '\ProductController@tambah');
Route::post('product/simpan', $url. '\ProductController@simpan');

// Delete
Route::delete('product/delete/{product:product_slug}', $url. '\ProductController@delete');

// Export
Route::get('product/export/xlsx', $url. '\ProductController@exportXl');
Route::get('product/export/csv', $url. '\ProductController@exportCSV');
Route::get('product/export/pdf', $url. '\ProductController@exportPDF');

// Import
Route::get('upload', $url. '\ProductController@upload');
Route::post('product/upload/data', $url. '\ProductController@uploadData');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// email

Route::get('kirimEmail', function () {
    
    $massage = [
        'title' => 'KAMU SIAPA?',
        'body' => 'SELAMAT DATANG'
    ];

    \Mail::to('hasannmunif@gmail.com')->send(new \App\Mail\EmailKu($massage));

    // dd("email terkirim");
});
