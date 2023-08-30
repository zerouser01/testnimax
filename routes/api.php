<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('Products', \App\Http\Controllers\Api\ProductApiController::class);
Route::resource('Categories', \App\Http\Controllers\Api\CategoryApiController::class);

Route::post('/products', [ProductApiController::class, 'createProduct']);
Route::put('/products/{product_id}', [ProductApiController::class, 'updateProduct']);
Route::delete('/products/{product_id}', [ProductApiController::class, 'deleteProduct']);

Route::post('/category', [CategoryApiController::class, 'createCategory']);
Route::delete('/category/{category_id}', [CategoryApiController::class, 'deleteCategory']);

Route::get('/products', [ProductApiController::class, 'getProducts']);
