<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');


// routes/web.php
use App\Http\Controllers\ProductController;

Route::middleware(['auth.shopify'])->group(function () {
    Route::get('/admin/select-products', [ProductController::class, 'index'])->name('admin.select-products');
    Route::post('/admin/save-products', [ProductController::class, 'saveSelection'])->name('admin.save-products');
});


// Route::get('/home', function () {
//     return "Hello, World!";
// })->middleware(['auth.shopify'])->name('home');
