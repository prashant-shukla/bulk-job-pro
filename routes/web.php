<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');


// Route::get('/home', function () {
//     return "Hello, World!";
// })->middleware(['auth.shopify'])->name('home');
