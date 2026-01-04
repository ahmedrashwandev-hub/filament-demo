<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/test',[TestController::class,'index'])
->middleware('auth');

Route::post('/orders/test', [OrderController::class, 'store']);

// To show login form
Route::get('login', [TestController::class, 'showLoginForm'])->name('login');

// To handle login submission
Route::post('login', [TestController::class, 'login'])->name('login.submit');
