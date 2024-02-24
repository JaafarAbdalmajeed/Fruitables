<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserController;

Route::middleware(['auth'])->group(function(){
    Route::get('/index',[UserController::class, 'index'])->name('user.index');
    Route::get('/shop',[UserController::class, 'shop'])->name('user.shop');
    Route::get('/shop-details',[UserController::class, 'shopDetails'])->name('user.shop_details');
    Route::get('/cart',[UserController::class, 'cart'])->name('user.cart');
    Route::get('/checkout',[UserController::class, 'checkout'])->name('user.checkout');
    Route::get('/testimonial',[UserController::class, 'testimonial'])->name('user.testimonial');
    Route::get('/404',[UserController::class, 'notFound'])->name('user.404');
    Route::get('/contact',[UserController::class, 'contact'])->name('user.contact');
});

