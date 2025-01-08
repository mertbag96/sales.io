<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
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
Route::prefix('/auth')->name('auth.')->middleware(['guest', 'web'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
    Route::post('/register', [AuthController::class, 'doRegister'])->name('doRegister');
});

// CRM
Route::prefix('/crm')->name('crm.')->middleware(['auth', 'web'])->group(function () {
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
    Route::prefix('/profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::get('/edit/{user}', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/edit/{user}', [ProfileController::class, 'update'])->name('update');
        Route::put('/change-password/{user}', [ProfileController::class, 'changePassword'])->name('change-password');
    });

    /* Notifications */
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');

    /* Logout */
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Set Language
Route::get('/set-language/{language}', [Controller::class, 'setLanguage'])->name('set-language');