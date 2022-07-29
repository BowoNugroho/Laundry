<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\LoginController;
use  App\Http\Controllers\RegisterController;
use  App\Http\Controllers\DashboardController;
use  App\Http\Controllers\CustomerController;
use  App\Http\Controllers\ServiceController;
use  App\Http\Controllers\SubServiceController;
use  App\Http\Controllers\BranchController;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\OutputController;
use  App\Http\Controllers\TransactionController;



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

Route::get('/login',  [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',  [LoginController::class, 'store']);

Route::post('/logout',  [LoginController::class, 'logout']);

Route::get('/register',  [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',  [RegisterController::class, 'store']);

Route::get('/dashboard',  [DashboardController::class, 'index'])->middleware('auth');

// Route::get('/customer',  [CustomerController::class, 'index'])->middleware('auth');
Route::resource('/customer', CustomerController::class)->middleware('auth');

Route::resource('/service', ServiceController::class)->middleware('auth');

Route::resource('/price', SubServiceController::class)->middleware('auth');

Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/branch', BranchController::class)->middleware('auth');
Route::resource('/output', OutputController::class)->middleware('auth');
Route::resource('/transaction', TransactionController::class)->middleware('auth');
Route::get('/get-data-customer/{id}', [TransactionController::class, 'dataCustomer'])->name("get-data-customer")->middleware('auth');
Route::get('/get-data-service/{id}', [TransactionController::class, 'dataService'])->name("get-data-service")->middleware('auth');
Route::get('/get-data-price/{id}', [TransactionController::class, 'dataprice'])->name("get-data-price")->middleware('auth');
