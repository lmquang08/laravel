<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\HomeController;
use App\Http\Controllers\Test\QueryBuilderController;

// cac routes dinh nghia o day.
Route::get('abc', function(){
    return "custom route";
});
// localhost:8000/abc

// su dung route voi controller
Route::get('test-home/{name}/{id}',[HomeController::class, 'index'])->name('test.home');
// localhost:8000/test-home
Route::post('handle-login-test',[HomeController::class, 'login'])->name('test.login.user');
Route::get('test-watch-film', [HomeController::class, 'watchFilm'])->name('test.watchFilm');

Route::prefix('query')->group(function(){
    Route::get('insert', [QueryBuilderController::class, 'insertUser']);
});