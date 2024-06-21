<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

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
    return view('welcome');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/home', [ProductController::class, 'listProduct']);

Route::get('/single', function () {
    return view('single');
});

Route::get('/single/{id_product}', [ReviewController::class, 'detailProduct']);

Route::get('/single/{id_product}/{filter}', [ReviewController::class, 'detailProduct']);

Route::get('/product', function () {
    return view('product');
});

Route::get('/product/{id_category}', [CategoryController::class, 'productsByCategory']);

Route::get('/brands', function () {
    return view('brands');
});

Route::get('/brands', [BrandController::class, 'index']);

Route::get('/brand/{id_category}', [CategoryController::class, 'productsByBrand']);

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/recommendation', [CategoryController::class, 'recom']);

Route::get('/recommendation/{id_category}', [ProductController::class, 'getTopRatedProductInCategory']);

Route::get('/contact', function () {
    return view('contact');
});