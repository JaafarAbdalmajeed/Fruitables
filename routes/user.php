<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\ShopController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\IndexController;
use App\Http\Controllers\user\CheckoutController;
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
    Route::get('/order',[UserController::class, 'myOrder'])->name('order.index');

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

    // cart page
    Route::get('/cart/fetch', [CartController::class ,'fetchItems']);
    Route::post('/cart/add-item', [CartController::class ,'addItem'])->name('cart.addItem');
    Route::post('/cart/remove-item', [CartController::class ,'removeItem']);
    Route::post('/cart/update-quantity', [CartController::class ,'updateQuantity'])->name('cart.quantity');
    Route::delete('/cart/delete/{id}', [CartController::class ,'removeItem']);

    // checkout page
    Route::get('/checkout/fetch', [CheckoutController::class ,'fetchData']);
    Route::post('place-order', [CheckoutController::class,'placeOrder'])->name('place-order');
    Route::get('proceed-to-pay', [CheckoutController::class, 'razorPayCheck']);

    // order page
    Route::get('/order/fetch', [UserController::class, 'orderItems']);



});

