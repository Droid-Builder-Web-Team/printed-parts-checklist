<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DroidsController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Admin Dashboard - Only users with the admin role can access these routes - RH
Route::middleware('role:Admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('admin-dashboard');
        Route::get('/users', [AdminController::class, 'getUsersDataTable'])->name('admin-users');
        Route::get('/droids', [AdminController::class, 'getDroidsDataTable'])->name('admin-droids');

        Route::prefix('droids')->group(function () {
            Route::get('/create', [DroidsController::class, 'create'])->name('admin-create-droid');
            Route::post('/store', [DroidsController::class, 'createUpdateNewDroid'])->name('admin-store-droid');
        });
    });
});

// Standard Logged In Routes - Users with verified accounts can access these pages - RH
Route::middleware('role:Admin|User')->group(function () {
    Route::get('/mainframe', [DroidsController::class, 'index'])->name('mainframe');
    Route::get('/droids/{droid}', [DroidsController::class, 'show'])->name('droids-show');
});

require __DIR__ . '/auth.php';
