<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RechirpController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Return login index
Route::get('/login', [UserController::class, 'index'])->name('login');

// Log user in
Route::post('/login/successful', [UserController::class, 'authenticate']);

// Register user
Route::post('/users/register', [UserController::class, 'register']);

Route::middleware('auth')->group(function () {

    //  Return index
    Route::get('/', [ChirpController::class, 'index'])->name('timeline');
    
    // Store chirp
    Route::post('/chirps/create', [ChirpController::class, 'store']);
    
    // Delete chirp
    Route::get('/chirps/delete/{chirp}', [ChirpController::class, 'destroy']);
    
    // Like chirp
    Route::get('/chirps/like/{chirp}', [LikeController::class, 'store']);
    
    // Unlike chirp
    Route::get('/chirps/unlike/{chirp}', [LikeController::class, 'destroy']);
    
    // Repost chirp
    Route::get('/chirps/rechirp/{chirp}', [RechirpController::class, 'store']);
    
    // Unrepost chirp
    Route::get('/chirps/unrechirp/{chirp}', [RechirpController::class, 'destroy']);
    
    // Edit user profile
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('edit profile');
    
    // Update user profile
    Route::put('/users/{user}/update', [UserController::class, 'update']);
    
    // Show followers
    Route::get('/users/{user}/followers', [FollowController::class, 'followers'])->name('followers');
    
    // Show following
    Route::get('/users/{user}/following', [FollowController::class, 'following'])->name('following');
    
    // Follow user
    Route::get('/users/{user}/follow', [FollowController::class, 'store']);
    
    // Unfollow user
    Route::get('/users/{user}/unfollow', [FollowController::class, 'destroy']);
    
    // User profile
    Route::get('/users/{user}', [UserController::class, 'show'])->name('profile');
    
    // Log user in
    Route::get('/logout', [UserController::class, 'destroy']);
    
    // Show create form
    Route::get('/register', [UserController::class, 'create']);
    
    // Show searched user(s) results
    Route::get('/discover', [SearchController::class, 'index'])->name('Discover Users');
    
});
