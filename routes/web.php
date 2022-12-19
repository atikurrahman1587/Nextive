<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::middleware(['role', 'verified',])->group(function () {
        Route::get('/users',[DashboardController::class,'users'])->name('users');
        Route::get('/role/{id}/edit',[DashboardController::class,'role_edit'])->name('role.edit');
        Route::post('/change-role',[DashboardController::class,'change_role'])->name('change-role');
        Route::post('/user-permission',[DashboardController::class,'user_permission'])->name('user-permission');
        Route::get('/user/{id}/details',[DashboardController::class,'user_details'])->name('user.details');
        Route::get('/user/{id}/delete',[DashboardController::class,'users_delete'])->name('user.delete');
    });
});
