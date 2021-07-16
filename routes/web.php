<?php

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Employee\EmployeeController;
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

Route::name('customer.')->group(function () {
    Route::get('/', [CustomerController::class, 'home'])->name('home');
    Route::get('/menu', [CustomerController::class, 'ShowMenu'])->name('menu');
});

Route::name('employee.')->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
