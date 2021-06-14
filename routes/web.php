<?php

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

Route::get('/hello-world', function () {
    return 'Hello world';
});


Route::group([ 'namespace'=> '\App\Http\Controllers' ], function () {
    Route::resource('dishes', 'DishController');
});

require __DIR__ . '/api.php';

Route::get('/', function () {
    return view('vue');
});
Route::get('{any}', function () {
    return view('vue');
});


