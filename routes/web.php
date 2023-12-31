<?php

use App\Http\Controllers\Auth\SocialiteAuthController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/chirps', [ChirpController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('chirps');

    Route::get('/notifications', [NotificationController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('notifications');

    Route::get('/auth/{provider}/redirect', [SocialiteAuthController::class, 'redirect'])->name('social-login');
    Route::get('/auth/{provider}/callback', [SocialiteAuthController::class, 'callback']);
    Route::get('/auth/{provider}/user', [SocialiteAuthController::class, 'index']);

require __DIR__.'/auth.php';
