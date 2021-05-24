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

/*Route::get('/', function () {
    return view('welcome');
});*/
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\AdminController;


Route::get('/', [ProductController::class, 'index'])
    ->name('products/index');

/*Route::post('/order/create', [OrderController::class, 'create'])
    ->name('order/create');*/
Route::get('/order/create', [OrderController::class, 'create'])
    ->name('order/create');

Route::post('/order', [OrderController::class, 'store'])
    ->name('order/store');

Route::get('/order/{id}', [OrderController::class, 'show'])
    ->name('order/show')
    ->where('id', '[0-9]+');

Route::get('/order/pdf/{id}',[OrderController::class, 'generatePDF'])
    ->name('order/pdf');


