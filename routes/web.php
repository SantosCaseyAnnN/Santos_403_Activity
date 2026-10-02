<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard');
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/counter', 'counter')->name('counter');
Route::view('/employees', 'employees-page')->name('employees');
