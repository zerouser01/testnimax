<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductCategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Resources\ProductResource;
use App\Models\Product as Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/i/products/index', [ProductApiController::class, 'index'])->name('products.index');
Route::get('/i/category/index', [CategoryApiController::class, 'index'])->name('category.index');
Route::get('/i/pc/index', [ProductCategoryApiController::class, 'index'])->name('pc.index');
Route::get('/i/products/create', [ProductApiController::class, 'create'])->name('products.create');
Route::get('/i/category/create', [CategoryApiController::class, 'create'])->name('category.create');
Route::post('/i/products', [ProductApiController::class, 'store'])->name('products.store');
Route::post('/i/categories', [CategoryApiController::class, 'store'])->name('category.store');

Route::get('/products/json/', function () {
    return ProductResource::collection(Product::all());
});
