<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
});

Auth::routes();

Route::get('/start', [App\Http\Controllers\StartPageController::class, 'index'])->name('start');

Route::get('/test', [\App\Http\Controllers\Test\ShowController::class, 'index'])->name('test');

Route::post('/test', [\App\Http\Controllers\Test\ShowController::class, 'store'])->name('test.store');

Route::get('/test/index', [\App\Http\Controllers\Test\IndexController::class, 'index'])->name('test.index');

Route::post('/test/result', [App\Http\Controllers\ResultController::class, 'index'])->name('result');

Route::get('/recommendations', [\App\Http\Controllers\Recomendation\ShowController::class, 'index'])->name('recommendations.index');
