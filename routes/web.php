<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerPanelController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\UserChartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductChartController;
use App\Http\Controllers\CustomerCartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//auth
Route::middleware('auth')->group(function () {
});
Route::get('/register', function () {
    return view('auth.register'); // Renders resources/views/register.blade.php
});
Route::get('/login', function () {
    return view('auth.login'); // Renders resources/views/login.blade.php
});

//productmanagement
Route::get('/products', function () {
    return view('products'); // Renders resources/views/login.blade.php
});
Route::post('products/import', [ProductController::class, 'importExcel'])->name('products.import');
Route::get('products/export', [ProductController::class, 'exportExcel'])->name('products.export');

//adminindex
Route::get('/admin', function () {
    return view('adminindex');
});

//charts
Route::get('/chart', [ChartController::class, 'index']);
Route::get('/userchart', [UserChartController::class, 'userChart']);
Route::get('/productchart', [ProductChartController::class, 'productChart']);

//users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


//category management
Route::get('/category', function() {
    return view('categories.categoryindex');
});




Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/customer', [CustomerPanelController::class, 'index'])->name('customerpanel');

//Route::get('/cusprod', [CustomerProductController::class, 'index'])->name('cusproducts');

Route::resource('cusprod', CustomerProductController::class);
Route::get('/customer/products/{id}', [CustomerProductController::class, 'show']);
Route::post('/customer/add-to-cart', [CustomerProductController::class, 'addToCart']);
Route::post('/customer/remove-from-cart', [CustomerProductController::class, 'removeFromCart']);
Route::get('/customer/cart', function () {
    return view('customer.customercart');
});

