<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 'Hello World !!!';
    // return redirect()->route('login');
});

Route::get('/home', function () {
    return "Hello, World!";
})->middleware(['auth.shopify'])->name('home');
