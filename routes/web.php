<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\AuthResetPasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DownloadController;

use App\Http\Controllers\LikeController;

use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
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
// get home
Route::get('/', function () {
    return view('songs');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/article', function () {
    return view('article');
});
Route::get('/contribute', function () {
    return view('contribute');
});
Route::get('/contact-us', function () {
    return view('contact-us');
});
Route::get('/playlists', function () {
    return view('playlists');
});
Route::get('/profile', function () {
    return view('profile');
});


// Admin routes
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('users', UserController::class);
});











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



// Route::post('/songs', [MusicController::class, 'store'])->name('songs.store');

Route::resource('comments', CommentController::class)->only(['index', 'store']);


Route::get('like/{songId}', [LikeController::class, 'likeSong'])->name('like.song');
Route::post('/like/{songId}', [LikeController::class, 'likeSong'])->name('like');


//dowload
Route::get('/download/{songId}', [DownloadController::class, 'downloadSong'])->name('song.download');

// routes/web.php


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('admin', function () {
            return view('admin/admin');
        });

        Route::get('vietnam', function () {
            return view('admin/vietnam');
        });

        Route::get('india', function () {
            return view('admin/india');
        });


        Route::get('most-searched-song', function () {
            return view('admin/most-searched-song');
        });


        Route::get('top-artists', function () {
            return view('admin/top-artists');
        });
    });

});
