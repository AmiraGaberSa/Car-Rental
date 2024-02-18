<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;


//verify email routes
Route::get('/email/verify', function () {
    return view('mails.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//login,logout and register routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('createAccount', [AuthController::class, 'store'])->name('createAccount');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//web pages routes
Route::get('/', [WebController::class, 'index'])->middleware('verified')->name('index');
Route::get('/home', [WebController::class, 'index'])->name('home');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/blog', [WebController::class, 'blog'])->name('blog');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/listing', [WebController::class, 'listing'])->name('listing');
Route::get('single/{id}', [WebController::class, 'single'])->name('single');
Route::get('/testimonials', [WebController::class, 'testimonials'])->name('testimonials');



