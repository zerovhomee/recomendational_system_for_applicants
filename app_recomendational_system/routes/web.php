<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [App\Http\Controllers\TestShowController::class, 'test'])->name('test');

Route::get('/result', [App\Http\Controllers\ResultController::class, 'result'])->name('result');

Route::get('/user/{user}', [App\Http\Controllers\UserShowController::class, 'user'])->name('user');
