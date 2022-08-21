<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SalesController;
use App\Models\Product;
use App\Models\Sold;
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

// Route::get('/draw', [ProductController::class, 'draw']);

Route::get('/page', function () {
    $solds = Sold::all();
    if (Auth::user()->is_admin == '1'){

        $solds = Sold::latest()->paginate(10);
        return view('users.dashboard', compact('solds'));
    }
    else{
        $solds = Sold::where('sold_by', '=', auth()->user()->name)->get();

        return view('sales.sales_dashboard', compact('solds'));
    }

    return view('sales.sales_dashboard');
});

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
Route::any('/create/user', [UserController::class, 'create'])->name('users.create');
Route::any('/index/user', [UserController::class, 'index'])->name('users.index');
Route::any('/store/user', [UserController::class, 'store'])->name('users.store');
Route::any('user/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('user/update/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('destroy/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::any('product/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('product/update/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('delete/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::any('catergory/store/', [ProductCategoryController::class, 'store'])->name('categories.store');
Route::any('catergory/create', [ProductCategoryController::class, 'create'])->name('categories.create');
Route::any('catergory/show/{category}', [ProductCategoryController::class, 'show'])->name('categories.show');
Route::any('catergory/edit/{category}', [ProductCategoryController::class, 'edit'])->name('categories.edit');
Route::any('catergory/update/{category}', [ProductCategoryController::class, 'update'])->name('categories.update');
Route::delete('delete/catergory/{category}', [ProductCategoryController::class, 'destroy'])->name('categories.destroy');
Route::any('catergory/index', [ProductCategoryController::class, 'index'])->name('categories.index');
// Route::any('users/dashboard', [])->name('users.dashboard');
Route::any('sales/list', [SalesController::class, 'soldItem'])->name('sold.item');
// Route::get('/page', [ChartJSController::class, 'draw']);



});


Route::get('/', function () {
    return view('auth.login');
 
});


// Route::post('/log', function(){
//     return view('auth.login');
// });


Route::prefix('product')->middleware('auth')->group(function () {
Route::any('create', [ProductController::class, 'create'])->name('products.create');
Route::post('store', [ProductController::class, 'store'])->name('products.store');
Route::any('index', [ProductController::class, 'index'])->name('products.index');
Route::any('sell/index', [SalesController::class, 'index'])->name('sales.index');
Route::get('sales/show/{product}', [ProductController::class, 'show'])->name('sale.show');
Route::any('sales/update/{id}', [SalesController::class, 'update'])->name('sales.update');
Route::any('sales/list', [SalesController::class, 'salesoldItem'])->name('sales.item');

});