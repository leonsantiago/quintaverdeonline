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

Route::post('/admin/orders/print/', [AdminController::class, 'print'])
    ->name('admin.orders.print');

# ORDEN DE COMPRAS
Route::get('/', [ProductController::class, 'index'])
    ->name('home');

Route::get('/orders/create', [OrderController::class, 'create'])
    ->name('orders.create');

Route::post('/orders', [OrderController::class, 'store'])
    ->name('orders.store');

Route::get('/orders/{id}', [OrderController::class, 'show'])
    ->name('orders.show')
    ->where('id', '[0-9]+');

Route::get('/orders/pdf/{id}',[OrderController::class, 'generatePDF'])
    ->name('orders.pdf')
    ->where('id', '[0-9]+');;

Route::delete('orders/{id}', [OrderController::class, 'destroy'])
    ->name('orders.destroy');

#ADMINISTRACION

Route::get('/admin/', [AdminController::class, 'index'])
    ->name('admin.index');
Route::get('/admin/products', [AdminController::class, 'products'])
    ->name('admin.products');
Route::get('/admin/orders', [AdminController::class, 'orders'])
    ->name('admin.orders.index');
Route::get('/admin/shopping', [AdminController::class, 'shopping'])
    ->name('admin.shopping');

Route::get('/admin/orders/{id}', [AdminController::class, 'show_order'])
    ->name('admin.orders.show');

#PRODUCTOS

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');
Route::get('/products/store', [ProductController::class, 'store'])
    ->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])
    ->name('products.update');
Route::delete('/products/destroy', [ProductController::class, 'destroy'])
    ->name('products.destroy');


