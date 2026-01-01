<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/test',[TestController::class,'index'])
->middleware('auth');

// Test route to create an order and trigger notifications (development-only)
Route::post('/orders/test', [OrderController::class, 'store']);
