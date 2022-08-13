<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;

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

Route::any('user/create', [UserController::class, 'create'])->name('users.create');
Route::any('user/index', [UserController::class, 'index'])->name('users.index');
Route::any('user/store', [UserController::class, 'store'])->name('users.store');
Route::any('user/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('user/update/{user}', [UserController::class, 'update'])->name('users.update');

Route::any('product/create', [ProductController::class, 'create'])->name('products.create');
Route::any('product/index', [ProductController::class, 'index'])->name('products.index');
Route::post('product/store/', [ProductController::class, 'store'])->name('products.store');
Route::any('product/index', [ProductController::class, 'index'])->name('products.index');
Route::any('product/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('product/update/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('delete/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::any('catergory/create', [ProductCategoryController::class, 'create'])->name('categories.create');
Route::any('catergory/index', [ProductCategoryController::class, 'index'])->name('categories.index');
Route::any('catergory/store/', [ProductCategoryController::class, 'store'])->name('categories.store');
Route::any('catergory/show/{category}', [ProductCategoryController::class, 'show'])->name('categories.show');
Route::any('catergory/index', [ProductCategoryController::class, 'index'])->name('categories.index');
Route::any('catergory/edit/{catergory}', [ProductCategoryController::class, 'edit'])->name('categories.edit');
Route::delete('delete/catergory/{catergory}', [ProductCategoryController::class, 'destory'])->name('categories.destroy');



Route::resource('product', ProductController::class);
Route::resource('inventory/category', ProductCategoryController::class);

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');