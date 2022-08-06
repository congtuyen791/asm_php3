<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Category;

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
// Route::prefix('/')->name('clients.')->group(function () {

// });

Route::get('/', function () {
    return view('home');
});
Route::get('/product', function () {
    return view('clients.product');
});
Route::get('/cart', function () {
    return view('clients.cart');
});
Route::get('/checkout', function () {
    return view('clients.checkout');
});
Route::get('/contact', function () {
    return view('clients.contact');
});
Route::get('/user', function () {
    return view('clients.login-logout');
});
Route::get('/product-detail', function () {
    return view('clients.product-detail');
});
// Route::get('/admin/layouts', function () {
//     return view('admin.layouts.main');  
// });

Route::middleware('admin')->prefix('/admin')->name('admin.')->group(function(){
    Route::get('/home', [UserController::class, 'index_admin'])->name('home');
    Route::prefix('/users')->name('users.')->group(function(){
        Route::get('/list', [UserController::class, 'index'])->name('list');
        Route::post('/role/{user}', [UserController::class, 'updateRole'])->name('role');
        Route::post('/status/{user}', [UserController::class, 'status'])->name('status');
    });
    Route::prefix('/products')->name('products.')->group(function(){
        Route::get('/list', [ProductController::class, 'index'])->name('list');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'postCreate'])->name('postCreate');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('/status/{product}&{status}', [ProductController::class, 'status'])->name('status');
        Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('delete');
    });
    Route::prefix('/categorys')->name('categorys.')->group(function(){
        Route::get('/list', [CategoryController::class, 'index'])->name('list');
    });
});
Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function(){
    Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
