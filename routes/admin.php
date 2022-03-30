<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes for admin
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// group name
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('login',[LoginController::class, 'index'])->name('login');
    Route::post('handle',[LoginController::class, 'handleLogin'])->name('handle.login');
    Route::post('logout',[LoginController::class, 'logout'])->name('logout');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware('check.login.admin.page')
    ->group(function(){
        Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
        Route::post('search-dashboard', [DashboardController::class, 'search'])->name('dashboard.search');
        Route::get('role',[RoleController::class,'index'])->name('roles');
});