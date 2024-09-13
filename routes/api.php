<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductTypeController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/product_type', [ProductTypeController::class,'index']);
Route::post('/product_type', [ProductTypeController::class,'create']);
Route::delete('/product_type/{id}', [ProductTypeController::class,'delete']);
Route::get('/product_type/{id}', [ProductTypeController::class,'show']);
Route::put('/product_type/{id}', [ProductTypeController::class,'update']);