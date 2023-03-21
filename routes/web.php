<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\UserController;
use App\Models\Chirp;
use App\Models\Follow;
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

/**
 * 
 * Chirp Handlers
 *  
 */

//  Return index
Route::get('/', [ChirpController::class, 'index'])->name('timeline')->middleware('auth');

// Store chirp
Route::post('/chirp/create', [ChirpController::class, 'store']);

// Follow user
Route::get('/users/{user}/follow', [FollowController::class, 'store']);

// Follow user
Route::get('/users/{user}/unfollow', [FollowController::class, 'destroy']);

// User profile
Route::get('/users/{user}', [UserController::class, 'show'])->name('profile');

/**
 * 
 * User Authentication Handlers
 *  
 */ 

// Return login index
Route::get('/login', [UserController::class, 'index'])->name('login');

// Log user in
Route::post('/login/successful', [UserController::class, 'authenticate']);

// Log user in
Route::get('/logout', [UserController::class, 'destroy']);

// Create user
Route::get('/register', [UserController::class, 'create']);
