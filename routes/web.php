<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SalesController;
use App\Models\ProductCategory;

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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/page', function () {
    if (Auth::user()->is_admin == '1'){
        return view('users.dashboard');
    }
    
    return view('sales.sales_dashboard');
});

// Route::get('/side', function() {
//     return view('layouts.navbars.sidebar');
// });

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
Route::any('/create/user', [UserController::class, 'create'])->name('users.create');
Route::any('/index/user', [UserController::class, 'index'])->name('users.index');
Route::any('/store/user', [UserController::class, 'store'])->name('users.store');
Route::any('user/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('user/update/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('destroy/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('product/store/', [ProductController::class, 'store'])->name('products.store');
Route::any('product/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('product/update/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('delete/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::any('product/show/{product}', [ProductController::class, 'show'])->name('products.show');

Route::any('catergory/store/', [ProductCategoryController::class, 'store'])->name('categories.store');
Route::any('catergory/create', [ProductCategoryController::class, 'create'])->name('categories.create');
Route::any('catergory/show/{category}', [ProductCategoryController::class, 'show'])->name('categories.show');
Route::any('catergory/edit/{category}', [ProductCategoryController::class, 'edit'])->name('categories.edit');
Route::any('catergory/update/{category}', [ProductCategoryController::class, 'update'])->name('categories.update');
Route::delete('delete/catergory/{category}', [ProductCategoryController::class, 'destroy'])->name('categories.destroy');
Route::any('catergory/index', [ProductCategoryController::class, 'index'])->name('categories.index');

});


Route::get('/', function () {
    return view('auth.login');
 
});


// Route::post('/log', function(){
//     return view('auth.login');
// });


Route::prefix('product')->middleware('auth')->group(function () {
Route::any('create', [ProductController::class, 'create'])->name('products.create');
Route::any('index', [ProductController::class, 'index'])->name('products.index');
// Route::any('catergory/create', [ProductCategoryController::class, 'create'])->name('categories.create');
// Route::any('catergory/index', [ProductCategoryController::class, 'index'])->name('categories.index');

// Route::any('sell/index', [SalesController::class, 'index'])->name('sales.index');

});


// Route::get('sell/{id}', [SalesController::class, 'select_from_listed_categories']);
// Route::get('sell', [SalesController::class, 'sold_products']);


