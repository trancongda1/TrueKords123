<?php

use App\Http\Controllers\Admin\ChordController;
use App\Http\Controllers\Admin\SongManagerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\AuthResetPasswordController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\LikeController;
use App\Http\Controllers\Admin\PlaylistController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\PlaylistsController;


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
// Group routes for views
Route::view('/', 'songs');
Route::view('/about', 'about');
Route::view('/article', 'article');
Route::view('/contribute', 'contribute');
Route::view('/contact-us', 'contact-us');
Route::view('/playlists', 'playlists');
Route::view('/profile', 'profile');




Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Routes for authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Routes for registration
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);




Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->middleware('guest')->name('password.reset');

Route::get('/forgot-password', [AuthResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [AuthResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');




Route::resource('comments', CommentController::class)->only(['index', 'store']);


Route::get('like/{songId}', [LikeController::class, 'likeSong'])->name('like.song');
Route::post('/like/{songId}', [LikeController::class, 'likeSong'])->name('like');

Route::middleware([AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('songs', SongManagerController::class);
        Route::resource('chords', ChordController::class);
        Route::resource('playlists', PlaylistController::class);

        Route::view('/', 'admin.admin')->name('dashboard');
        Route::view('statistics', 'admin.statistics')->name('statistics');
        Route::view('comment', 'admin.comment')->name('comment');
        Route::view('like', 'admin.like')->name('like');
        Route::view('rate', 'admin.rate')->name('rate');
        Route::view('contribution', 'admin.contribution')->name('contribution');
    });

    Route::get('/playlists', [PlaylistsController::class, 'index']);
