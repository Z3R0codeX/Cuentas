<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcountsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TransactionsController;

Route::resource('acounts', AcountsController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('transactions', TransactionsController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
