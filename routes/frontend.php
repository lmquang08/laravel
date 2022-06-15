<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPage\LoginPageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\RegisterController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::name('frontend.')->group(function(){
//     Route::get('/', [HomeController::class, 'index'])->name('home.index');
//     Route::get('about', [AboutController::class, 'index'])->name('about.index');

// });

Route::prefix('frontend')->name('frontend.')->group(function(){
    Route::get('login',[LoginController::class, 'index'])->name('login');
    Route::post('handle',[LoginController::class, 'handleLogin'])->name('handle.login');
    Route::post('logout',[LoginController::class, 'logout'])->name('logout');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('handle-register', [RegisterController::class, 'handleRegister'])->name('handle.register');
});

Route::prefix('frontend')
    ->name('frontend.')
    ->middleware('check.login.home.page')
    ->group(function (){
        Route::get('home-page', [HomeController::class, 'index'])->name('home.index');
        Route::get('about', [AboutController::class, 'index'])->name('about.index');
    });