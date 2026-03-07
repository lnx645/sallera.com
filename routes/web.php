<?php

use App\Http\Controllers\AuthLoginController;
use Illuminate\Support\Facades\Route;
Route::get('login',AuthLoginController::class)->name('login');
Route::post('login',[AuthLoginController::class,'processing'])->name('login.processing');
Route::inertia('/', 'Welcome')->name('home');
