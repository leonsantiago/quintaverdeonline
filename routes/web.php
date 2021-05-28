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

# ORDEN DE COMPRAS
Route::get('/', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/order/create', [OrderController::class, 'create'])
    ->name('order.create');

Route::post('/order', [OrderController::class, 'store'])
    ->name('order.store');

Route::get('/order/{id}', [OrderController::class, 'show'])
    ->name('order.show')
    ->where('id', '[0-9]+');

Route::get('/order/pdf/{id}',[OrderController::class, 'generatePDF'])
    ->name('order.pdf');

#ADMINISTRACION

Route::get('/admin/', [AdminController::class, 'index'])
    ->name('admin.index');
Route::get('/admin/products', [AdminController::class, 'products'])
    ->name('admin.products');
Route::get('/admin/orders', [AdminController::class, 'orders'])
    ->name('admin.orders');
Route::get('/admin/shopping', [AdminController::class, 'shopping'])
    ->name('admin.shopping');

#PRODUCTOS

Route::get('/product/create', [ProductController::class, 'create'])
    ->name('product.create');
Route::get('product/store', [ProductController::class, 'store'])
    ->name('product.store');
Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.show');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])
    ->name('product.edit');
Route::delete('/product/destroy', [ProductController::class, 'destroy'])
    ->name('product.destroy');


