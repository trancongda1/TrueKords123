<?php

use App\Http\Controllers\Admin\ChordController;
use App\Http\Controllers\Admin\SongManagerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\LikeController;
use App\Http\Controllers\Admin\PlaylistController;
use App\Http\Controllers\Admin\ContributionController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\AuthResetPasswordController;

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
Route::view('/about', 'about');
Route::view('/article', 'article');
Route::view('/contribute', 'contribute');
Route::view('/contact-us', 'contact-us');
Route::view('/playlists', 'playlists');
Route::view('/profile', 'profile');

// Routes for authentication
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->middleware('guest')->name('password.reset');
Route::get('/forgot-password', [AuthResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [AuthResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Admin routes
Route::middleware([AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('contributions', ContributionController::class);
        Route::resource('users', UserController::class);
        Route::resource('songs', SongManagerController::class);
        Route::resource('chords', ChordController::class);
        Route::resource('playlist', PlaylistController::class);
        Route::get('like', [LikeController::class, 'index'])->name('likes.index');
        Route::get('ratings', [RatingController::class, 'index'])->name('ratings.index');

        // Routes for approving and rejecting contributions
        Route::post('/contributions/{id}/approve', [ContributionController::class, 'approve'])->name('contributions.approve');
        Route::post('/contributions/{id}/reject', [ContributionController::class, 'reject'])->name('contributions.reject');

        Route::view('/', 'admin.admin')->name('dashboard');
        Route::view('statistics', 'admin.statistics')->name('statistics');
        Route::view('comment', 'admin.comment')->name('comment');
        Route::view('rate', 'admin.rate')->name('rate');
    });

// User routes
Route::get('/', [SongManagerController::class, 'searchIndex'])->name('user.songs.search');
Route::get('/songs/{id}/chords', [SongManagerController::class, 'showChords'])->name('songs.chords');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/ratings', [RatingController::class, 'index'])->name('ratings.index');
Route::get('/contributions', [ContributionController::class, 'indexUser'])->name('contributions.indexUser');
Route::resource('/contributions', ContributionController::class)->only(['create', 'store']);
Route::resource('songs', SongManagerController::class, ['as' => 'user']);
Route::get('/playlists', [PlaylistController::class, 'showPlaylists'])->name('playlists.show');
Route::get('/playlists/search', [PlaylistController::class, 'searchPlaylists'])->name('playlists.search');
