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

//router dành cho user
// 


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







Route::middleware([AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('songs', SongManagerController::class);
        Route::resource('chords', ChordController::class);
        Route::resource('playlist', PlaylistController::class);
        Route::resource('contributions', ContributionController::class);
        Route::get('like', [LikeController::class, 'index'])->name('likes.index');
        Route::get('ratings', [RatingController::class, 'index'])->name('ratings.index');
        

        Route::view('/', 'admin.admin')->name('dashboard');
        Route::view('statistics', 'admin.statistics')->name('statistics');
        Route::view('comment', 'admin.comment')->name('comment');
        Route::view('rate', 'admin.rate')->name('rate');
    });
