<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductsController::class, 'index'])->name('index');
Route::get('/products/{slug}-{id}', [ProductsController::class, 'showProduct'])->name('show');
Route::get('/create', [ProductsController::class, 'create'])->name('create');
Route::post('/postProduct', [ProductsController::class, 'publishProduct'])->name('postProduct');
