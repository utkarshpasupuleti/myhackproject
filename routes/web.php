<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\HomePageController;
use App\View\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('auth/redirect', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/callback', [GoogleController::class, 'handleCallback']);
Route::get("/becomefreelancer", [HomePageController::class, "becomefreelancer"])->name("becomefreelancer");
Route::post('/set-intended-route', [AuthenticatedSessionController::class, 'setIntendedRoute']);
Route::get('/testing', [HomePageController::class, 'test'])->name("test");
Route::get('/uploadgig', [HomePageController::class, 'uploadgig'])->name("uploadgig");
Route::post('/gigs', [GigController::class, 'store'])->name('gigs');
Route::get("/gigdetails", [GigController::class, 'show'])->name('gigdetails');
Route::post('/favourites', [GigController::class, 'favourites'])->name('favourites');


Route::get('/', [HomePageController::class, "index"])->name("home");
Route::get('/api/cards', [CardController::class, 'fetchCards']);
Route::get('/dashboard', [HomePageController::class, "dashboard"])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/purpose', [HomePageController::class, 'purpose'])->name("purpose");



Route::get('/categories', [CategoryController::class, 'index'])->name("categories");
Route::get('/search', [HomePageController::class, 'search'])->name("search");
// routes/web.php
Route::post('/profileupdate', [HomePageController::class, 'update'])->name('profileupdate');

Route::get("/security", [HomePageController::class, "security"])->name("security");



require __DIR__.'/auth.php';
