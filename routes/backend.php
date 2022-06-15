<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\SwitchRoleController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\CustomerController;

use App\Enums\Constants;

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
    Route::view('not-permission', 'admin.not-permission')->name('not.permission');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware('check.login.admin.page')
    ->group(function (){
        Route::get('switch-role',[SwitchRoleController::class, 'index'] )->name('chose.role');
        Route::post('handle-switch-role/{id}', [SwitchRoleController::class, 'handleSwitchRole'])->name('handle.switch.role');
    });

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['check.login.admin.page', 'check.switch.role.admin'])
    ->group(function(){

        // dashboard
        Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
        Route::post('search-dashboard', [DashboardController::class, 'search'])->name('dashboard.search');

        // role
        Route::get('role',[RoleController::class,'index'])->name('roles');
        Route::get('add-role', [RoleController::class, 'addRole'])->name('add.role');
        Route::post('handle-add-role, [role]',[RoleController::class, 'handleAddRole'])->name('handle.add.role');

        // permissions
        Route::get('permissions',[PermissionController::class, 'index'])->name('permissions');
        Route::post('add-permission',[PermissionController::class, 'handleAdd'])->name('add.permission');

        // account
        Route::get('account', [AccountController::class, 'index'])->name('account');
        Route::get('add-account', [AccountController::class, 'addAccount'])
                    ->middleware('token.authenticate:'.Constants::CREATE_USER)
                    ->name('add.account');
        Route::post('handle-add-account', [AccountController::class, 'handleAdd'])
                    ->middleware('token.authenticate:'.Constants::CREATE_USER)
                    ->name('handle.add.account');
        // Route::get('/edit-account/{id}', [AccountController::class, 'edit'])
        //              ->name('edit.account');
        // Route::post('handle-edit-account', [AccountController::class, 'handleEdit'])
        //             ->name('handle.edit.account');
        
        //Tour
        Route::get('tour', [TourController::class, 'index'])->name('tour');
        Route::get('add-tour', [TourController::class, 'addTour'])->name('add.tour');
        Route::post('handle-add-tour',[TourController::class, 'handleAddTour'])->name('handle.add.tour');

        //customers
        Route::get('customer', [CustomerController::class, 'index'])->name('customer');
        Route::get('add-customer', [CustomerController::class, 'addCustomer'])->name('add.customer');
        Route::post('handle-add-customer',[CustomerController::class, 'handleAddCustomer'])->name('handle.add.customer');

        
});

Route::get('edit-account/{id}', [AccountController::class, 'edit']);
Route::post('update-account/{id}', [AccountController::class, 'handleEdit']);
Route::get('delete-account/{id}', [AccountController::class, 'handleDelete']);