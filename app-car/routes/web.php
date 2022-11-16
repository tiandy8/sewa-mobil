<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CarController;
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

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('detail', [HomeController::class, 'detail'])->name('detail');

Route::get('admin/dashboard',[\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index')->middleware('is_admin');
Route::resource('admin/cars', CarController::class);
Route::put('admin/cars/update-image/{id}', [\App\Http\Controllers\Admin\CarController::class, 'updateImage'])->name('admin.cars.updateImage');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
