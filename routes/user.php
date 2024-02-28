<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\ShopController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\IndexController;
use App\Http\Controllers\user\ShopDetailController;

Route::middleware(['auth'])->group(function(){
    // pages
    Route::get('/index',[UserController::class, 'index'])->name('user.index');
    Route::get('/shop',[UserController::class, 'shop'])->name('user.shop');
    Route::get('/shop-details',[UserController::class, 'shopDetails'])->name('user.shop_details');
    Route::get('/cart',[UserController::class, 'cart'])->name('user.cart');
    Route::get('/checkout',[UserController::class, 'checkout'])->name('user.checkout');
    Route::get('/testimonial',[UserController::class, 'testimonial'])->name('user.testimonial');
    Route::get('/404',[UserController::class, 'notFound'])->name('user.404');
    Route::get('/contact',[UserController::class, 'contact'])->name('user.contact');

    // Index Page
    Route::get('index/products',[IndexController::class, 'products'])->name('products.index');
    Route::get('index/vegetables',[IndexController::class, 'vegetables'])->name('vegetables.index');
    Route::get('index/fruits',[IndexController::class, 'fruits'])->name('fruits.index');
    Route::get('index/doughs',[IndexController::class, 'doughs'])->name('doughs.index');
    Route::get('index/meats',[IndexController::class, 'meats'])->name('meats.index');

    // shop page
    Route::get('shop/search',[ShopController::class, 'search'])->name('products.search');
    Route::get('shop/category/products',[ShopController::class, 'productsCategory'])->name('category.products');
    Route::get('shop/price/products',[ShopController::class, 'productsPrice'])->name('price.products');

    // show details
    Route::get('shop/product/{id}',[ShopDetailController::class, 'product']);
    Route::get('shop/related/product',[ShopDetailController::class, 'relatedProducts'])->name('products.related');

    // cart
    Route::get('/cart/fetch', [CartController::class ,'fetchItems'])->name('cart.fetch');
    Route::post('/cart/add-item', [CartController::class ,'addItem'])->name('cart.addItem');
    Route::post('/cart/remove-item', [CartController::class ,'removeItem']);
    Route::post('/cart/update-quantity', [CartController::class ,'updateQuantity']);

});

