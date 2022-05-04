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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//thêm sản phẩm
Route::get('add-new-product', [App\Http\Controllers\ProductController::class, 'add_product'])->name('');
Route::post('save-product', [App\Http\Controllers\ProductController::class, 'save_product'])->name('');
//tất cả sản phẩm
Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('');


//thành viên
//thêm thành viên
Route::get('add-new-user', [App\Http\Controllers\UserController::class, 'form_add_user'])->name('');
Route::post('save-user', [App\Http\Controllers\UserController::class, 'save_user'])->name('');
Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('');
Route::get('/add-image-product/{product_id}/for={product_name}', [App\Http\Controllers\imageProductController::class, 'add_imageproduct'])->name('');
Route::post('/select-image', [App\Http\Controllers\imageProductController::class, 'select_image'])->name('');
Route::post('/insert-image-product/{product_id}', [App\Http\Controllers\imageProductController::class, 'insert_image_product'])->name('');
Route::post('/delete-image-product/', [App\Http\Controllers\imageProductController::class, 'delete_image'])->name('');