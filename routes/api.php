<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/brands', [BrandController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/reviews', [ReviewController::class, 'index']);
// Route::get('/reviews-product', [ReviewController::class, 'reviewProduct']);

Route::get('/recom/{id_category}', [ProductController::class, 'getTopRatedProductInCategory']);

Route::post('/view-csv', [ReviewController::class, 'viewCsvContent']);

Route::post('/upload-review-sociolla', [ReviewController::class, 'uploadCsvSociolla']);

Route::post('/upload-review-fd', [ReviewController::class, 'uploadCsvFd']);

Route::delete('/delete-review', [ReviewController::class, 'deleteReviewsByProduct']);
