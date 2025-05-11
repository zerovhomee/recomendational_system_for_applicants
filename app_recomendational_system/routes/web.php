<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\StartPageController::class, 'index'])->name('home');

Route::get('/test', [App\Http\Controllers\TestShowController::class, 'index'])->name('test');

Route::post('/test/result', [App\Http\Controllers\ResultController::class, 'index'])->name('result');

Route::get('/user/{user}', [App\Http\Controllers\UserShowController::class, 'user'])->name('user');
