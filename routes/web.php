<?php

use App\Http\Controllers\Admin\SupporterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        Route::resource('supporters', SupporterController::class);
        Route::get('supporters-export', [SupporterController::class, 'export'])->name('supporters.export');
        Route::get('supporters-print', [SupporterController::class, 'print'])->name('supporters.print');
    });
});




require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
