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
Route::get('/admin/layouts', function () {
    return view('admin.layouts.main');  
});
