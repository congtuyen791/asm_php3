<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
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

Route::prefix('/')->name('')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('home');
    Route::get('/product-detail/{id}', [ClientController::class, 'productDetail'])->name('productDetail');
    Route::get('/product', [ClientController::class, 'product'])->name('product');
    Route::get('/categoryProducts/{id}', [ClientController::class, 'categoryProducts'])->name('categoryProducts');
    Route::get('/sizeProducts/{id}', [ClientController::class, 'sizeProducts'])->name('sizeProducts');
    Route::get('/searchProduct', [ClientController::class, 'searchProduct'])->name('searchProduct');
    Route::prefix('')->name('')->group(function () {
        Route::get('/listCart', [CartController::class, 'listCart'])->name('listCart');
        Route::get('/addCart/{id}', [CartController::class, 'addCart'])->name('addCart');
        Route::get('/delete/{id}', [CartController::class, 'delete'])->name('delete');
        Route::get('/order/{tt}', [OrderController::class, 'getOrder'])->name('order');
        Route::get('/add-order/{tt}', [OrderController::class, 'addOrder'])->name('addOrder');
    });
});


// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/product', function () {
//     return view('clients.product');
// });
// Route::get('/cart', function () {
//     return view('clients.cart');
// });
Route::get('/checkout', function () {
    return view('clients.checkout');
});
Route::get('/contact', function () {
    return view('clients.contact');
});
// Route::get('/user', function () {
//     return view('clients.login-logout');
// });
Route::get('/product-detail', function () {
    return view('clients.product-detail');
});
// Route::get('/admin/layouts', function () {
//     return view('admin.layouts.main');  
// });

Route::middleware('admin')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/home', [UserController::class, 'index_admin'])->name('home');
    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/list', [UserController::class, 'index'])->name('list');
        Route::post('/role/{user}', [UserController::class, 'updateRole'])->name('role');
        Route::post('/status/{user}', [UserController::class, 'status'])->name('status');
    });
    Route::prefix('/products')->name('products.')->group(function () {
        Route::get('/list', [ProductController::class, 'index'])->name('list');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'postCreate'])->name('postCreate');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('/status/{product}&{status}', [ProductController::class, 'status'])->name('status');
        Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('delete');
    });
    Route::prefix('/categorys')->name('categorys.')->group(function () {
        Route::get('/list', [CategoryController::class, 'index'])->name('list');
        Route::get('/create', [CategoryController::class, 'getCreate'])->name('getCreate');
        Route::post('/create', [CategoryController::class, 'postCreate'])->name('postCreate');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
    Route::prefix('/size')->name('size.')->group(function () {
        Route::get('/list', [SizeController::class, 'index'])->name('list');
        Route::get('/create', [SizeController::class, 'getCreate'])->name('getCreate');
        Route::post('/create', [SizeController::class, 'postCreate'])->name('postCreate');
        Route::get('/edit/{id}', [SizeController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SizeController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SizeController::class, 'delete'])->name('delete');
    });
    Route::prefix('/comment')->name('comments.')->group(function () {
        Route::get('/list', [CommentController::class, 'index'])->name('list');
        Route::get('/create', [CommentController::class, 'getCreate'])->name('getCreate');
        Route::post('/create', [CommentController::class, 'postCreate'])->name('postCreate');
        Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CommentController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CommentController::class, 'delete'])->name('delete');
    });
});
Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
