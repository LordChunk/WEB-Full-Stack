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
    Route::get('/news', [CustomerController::class, 'news'])->name('news');
    Route::get('/about', [CustomerController::class, 'about'])->name('about');
    Route::get('/order', [CustomerController::class, 'order'])->name('order');
    Route::get('/discount', [CustomerController::class, 'discount'])->name('discount');
    Route::get('/studentdiscount', [CustomerController::class, 'studentdiscount'])->name('studentdiscount');

    // Place order
    Route::post('/order/confirm', [CustomerController::class, 'orderConfirm'])->name('order.confirm');


});

Route::name('employee.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'index'])->name('dashboard');
    Route::get('/employee/menu', [EmployeeController::class, 'menu'])->name('menu');
    Route::get('/employee/order', [EmployeeController::class, 'order'])->name('order');
    Route::get('/employee/sales', [EmployeeController::class, 'sales'])->name('sales');

    // Place order
    Route::post('/employee/order/confirm', [EmployeeController::class, 'orderConfirm'])->name('order.confirm');
    // Update allergies
    Route::post('/employee/menu/update/allergies', [EmployeeController::class, 'updateAllergies'])->name('menu.update.allergies');
    // Update spiciness
    Route::post('/employee/menu/update/spiciness', [EmployeeController::class, 'updateSpiciness'])->name('menu.update.spiciness');
});

require __DIR__.'/auth.php';
