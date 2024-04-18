<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage
Route::get('/', [App\Http\Controllers\postController::class, 'vu'])->name('welcome');

// Public routes
Route::get('/post/{id}/show', [App\Http\Controllers\postController::class, 'show'])->name('post.show');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('dashboard.index');
    })->name('home');

    Route::get('/post', [App\Http\Controllers\postController::class, 'index'])->name('post.index');
    Route::get('/post/create', [App\Http\Controllers\postController::class, 'create'])->name('post.create');
    Route::post('/post', [App\Http\Controllers\postController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/edit', [App\Http\Controllers\postController::class, 'edit'])->name('post.edit');
    Route::put('/post/{id}', [App\Http\Controllers\postController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [App\Http\Controllers\postController::class, 'destroy'])->name('post.destroy');

    // Donations
    Route::get('/donations/create/{postId}', [App\Http\Controllers\DonationController::class, 'create'])->name('donations.create');
    Route::post('/donations/store', [App\Http\Controllers\DonationController::class, 'store'])->name('donations.store');
    Route::get('/donations', [App\Http\Controllers\DonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/{id}', [App\Http\Controllers\DonationController::class, 'show'])->name('donations.show');
    Route::delete('/donations/{id}', [App\Http\Controllers\DonationController::class, 'destroy'])->name('donations.destroy');

    // Notifications
    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}read', [App\Http\Controllers\NotificationController::class, 'read'])->name('notifications.read');



});

Auth::routes();


Route::get('post/accepter/{id}', [\App\Http\Controllers\postController::class, 'accepter'])->name('post.accepter');


Route::get('profile/{profile}/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/{id}', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

