<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');
});