<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CRM\ProfileController;
use App\Http\Controllers\CRM\DashboardController;
use App\Http\Controllers\CRM\MonitoringController;
use App\Http\Controllers\CRM\NotificationsController;

use App\Http\Controllers\CRM\Administration\RoleController;
use App\Http\Controllers\CRM\Administration\UserController;
use App\Http\Controllers\CRM\Administration\CompanyController;
use App\Http\Controllers\CRM\Administration\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Index
Route::redirect('/', '/crm');

// Auth
Route::prefix('/auth')->name('auth.')->middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
    Route::post('/register', [AuthController::class, 'doRegister'])->name('doRegister');
});

// CRM
Route::prefix('/crm')->name('crm.')->middleware(['auth'])->group(function () {
    /* Overview */
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring');

    /* Administration */
    Route::prefix('/administration')->name('administration.')->group(function () {
        /* Roles */
        Route::resource('roles', RoleController::class);

        /* Users */
        Route::resource('users', UserController::class);

        /* Companies */
        Route::resource('companies', CompanyController::class);

        /* Customers */
        Route::resource('customers', CustomerController::class);
    });

    /* Profile */
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    /* Notifications */
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');

    /* Logout */
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});