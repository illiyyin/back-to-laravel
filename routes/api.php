<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductTypeController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\BrandController;
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

Route::post('/brand', [BrandController::class, 'create']);
Route::get('/brand', [BrandController::class, 'index']);
Route::delete('/brand/{id}', [BrandController::class, 'delete']);
Route::get('/brand/{id}', [BrandController::class, 'show']);
Route::put('/brand/{id}', [BrandController::class, 'update']);

Route::post('/product_sku', [ProductSKUController::class, 'create']);
Route::get('/product_sku', [ProductSKUController::class, 'index']);
Route::delete('/product_sku/{id}', [ProductSKUController::class, 'delete']);
Route::get('/product_sku/{id}', [ProductSKUController::class, 'show']);
Route::put('/product_sku/{id}', [ProductSKUController::class, 'update']);
