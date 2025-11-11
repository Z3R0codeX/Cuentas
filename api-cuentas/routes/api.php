<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcountsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::resource('acounts', AcountsController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('transactions', TransactionsController::class);

Route::post('changestatus/{id}', [AcountsController::class, 'changeStatus']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware("jwt")->group(function () {
    Route::resource('acounts', AcountsController::class);
   Route::post('changestatus/{id}', [AcountsController::class, 'changeStatus']);
    Route::resource('categories', CategoriesController::class);
    Route::resource('transactions', TransactionsController::class); 
});
