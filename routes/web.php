<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Admin Dashboard - Only users with the admin role can access these routes - RH
Route::middleware('role:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('admin-dashboard');
        Route::get('/users', [AdminController::class, 'getUsersDataTable'])->name('admin-users');
        Route::get('/droids', [AdminController::class, 'getDroidsDataTable'])->name('admin-droids');
    });
});

require __DIR__ . '/auth.php';
