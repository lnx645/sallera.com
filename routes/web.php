<?php

use Illuminate\Support\Facades\Route;
Route::inertia('/login','login');
Route::inertia('/', 'Welcome')->name('home');
