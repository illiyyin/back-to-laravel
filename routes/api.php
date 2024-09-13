<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductTypeController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\ProductBrandController;
use App\Http\Controllers\api\ProductSKUController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/product_type', [ProductTypeController::class, 'index']);
Route::post('/product_type', [ProductTypeController::class, 'create']);
Route::delete('/product_type/{id}', [ProductTypeController::class, 'delete']);
Route::get('/product_type/{id}', [ProductTypeController::class, 'show']);
Route::put('/product_type/{id}', [ProductTypeController::class, 'update']);

Route::post('/product', [ProductController::class, 'create']);
Route::get('/product', [ProductController::class, 'index']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::put('/product/{id}', [ProductController::class, 'update']);

Route::post('/product_brand', [ProductBrandController::class, 'create']);
Route::get('/product_brand', [ProductBrandController::class, 'index']);
Route::delete('/product_brand/{id}', [ProductBrandController::class, 'delete']);
Route::get('/product_brand/{id}', [ProductBrandController::class, 'show']);
Route::put('/product_brand/{id}', [ProductBrandController::class, 'update']);

Route::post('/product_sku', [ProductSKUController::class, 'create']);
Route::get('/product_sku', [ProductSKUController::class, 'index']);
Route::delete('/product_sku/{id}', [ProductSKUController::class, 'delete']);
Route::get('/product_sku/{id}', [ProductSKUController::class, 'show']);
Route::put('/product_sku/{id}', [ProductSKUController::class, 'update']);
