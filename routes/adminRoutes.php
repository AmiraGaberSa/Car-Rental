<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;


Route::middleware(['auth', 'active','verified'])->prefix('admin')->group(function () {
    
    //user
    Route::get('addUser', [UserController::class, 'create'])->name('addUser');
    Route::post('storeUser', [UserController::class, 'store'])->name('storeUser');
    Route::get('users', [UserController::class, 'index'])->name('users');  
    Route::get('editUser/{id}', [UserController::class, 'edit'])->name('editUser');
    Route::put('updateUser/{id}', [UserController::class, 'update'])->name('updateUser');

    //category
    Route::get('addCategory', [CategoryController::class, 'create'])->name('addCategory');
    Route::post('storeCategory', [CategoryController::class, 'store'])->name('storeCategory');
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');  
    Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::put('updateCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');
    Route::get('deleteCategory/{id}',[CategoryController::class,'destroy'])->name('deleteCategory');

    //car
    Route::get('addCar', [CarController::class, 'create'])->name('addCar');
    Route::post('storeCar', [CarController::class, 'store'])->name('storeCar');
    Route::get('cars', [CarController::class, 'index'])->name('cars');  
    Route::get('editCar/{id}', [CarController::class, 'edit'])->name('editCar');
    Route::put('updateCar/{id}', [CarController::class, 'update'])->name('updateCar');
    Route::get('deleteCar/{id}',[CarController::class,'destroy'])->name('deleteCar');

    //testimonials
    Route::get('addTestimonials', [TestimonialController::class, 'create'])->name('addTestimonials');
    Route::post('storeTestimonial', [TestimonialController::class, 'store'])->name('storeTestimonial');
    Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial');  
    Route::get('editTestimonials/{id}', [TestimonialController::class, 'edit'])->name('editTestimonials');
    Route::put('updateTestimonials/{id}', [TestimonialController::class, 'update'])->name('updateTestimonials');
    Route::get('deleteTestimonial/{id}',[TestimonialController::class,'destroy'])->name('deleteTestimonial');

    //contact
    //d.b store from page form
    Route::post('storeContact',[ContactController::class,'store'])->name('storeContact');
    Route::get('messages',[ContactController::class,'index'])->name('messages');
    Route::get('showMessage/{id}',[ContactController::class,'show'])->name('showMessage');
    Route::get('deleteMessage/{id}', [ContactController::class, 'destroy'])->name('deleteMessage'); 

});

