<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});


Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalCategories' => \App\Models\Category::count(),
        'totalItems' => \App\Models\Item::count(),
        'totalStock' => \App\Models\Item::sum('stock'),
    ]);
})->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('categories', CategoryController::class)
        ->except(['show']);

    Route::resource('items', ItemController::class)
        ->except(['show']);

