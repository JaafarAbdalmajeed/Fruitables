<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubcategoryController;


Route::middleware(['auth', 'admin'])->group(function(){

    Route::get('/admin',[AdminController::class, 'index']);

    // Category Routes
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/fetch-data', [CategoryController::class, 'fetchData'])->name('category.fetch');
    Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::delete('/category/delete', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::put('/category/edit', [CategoryController::class, 'update'])->name('category.update');

    // Subcategory Routes
    Route::get('/subcategory/index', [SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/subcategory/fetch-data', [SubcategoryController::class, 'fetchData'])->name('subcategory.fetch');
    Route::post('/subcategory/assign', [SubcategoryController::class, 'assign'])->name('subcategory.assign');
    Route::post('/subcategory/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::delete('/subcategory/delete', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');
    Route::put('/subcategory/edit', [SubcategoryController::class, 'update'])->name('subcategory.update');

    // Product Routes
    Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/fetch', [ProductController::class, 'fetchData'])->name('product.fetch');
    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete', [ProductController::class, 'destroy'])->name('product.delete');
    Route::post('/product/assign', [ProductController::class, 'assign'])->name('product.assign');


    // User Routes
    Route::get('/admin/user/index', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/fetch', [UserController::class, 'fetchData'])->name('admin.user.fetch');
    Route::post('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user/update', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/delete', [UserController::class, 'destroy'])->name('admin.user.delete');

});
