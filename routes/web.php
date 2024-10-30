<?php

// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/', [HomeController::class, 'welcome'])->name('home');
});

Route::middleware(['shop.auth'])->group(function () {
    Route::get('/admin/select-products', [ProductController::class, 'index'])->name('admin.select-products');
    Route::post('/admin/save-products', [ProductController::class, 'saveSelection'])->name('admin.save-products');
});


// Route::get('/home', function () {
//     return "Hello, World!";
// })->middleware(['auth.shopify'])->name('home');
