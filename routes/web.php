<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\AuthResetPasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\MusicGenresController;
use App\Http\Controllers\NewReleasesController;
use App\Http\Controllers\OldSongController;
use App\Http\Controllers\SearchSongController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\TopRankingController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Song;
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
Route::get('/test', function () {
    return view('test');
});
Route::get('/music', function () {
    return view('music');
});

// Admin routes


// User routes
Route::prefix('users')->group(function () {
    Route::get('old-music', [OldSongController::class, 'index'])->name('users.old-music');

    Route::get('most-searched-song', [SongController::class, 'mostSearchedSongs'])->name('users.most-searched-song');

    Route::get('top-ranking', [TopRankingController::class, 'index'])->name('users.top-ranking');

    Route::get('new-releases', [NewReleasesController::class, 'index'])->name('users.new-releases');
});



Route::get('users/languages', function () {
    return view('users/languages');
});

Route::get('users/genres', function () {
    return view('users/genres');
});
Route::get('users/top-artists', function () {
    return view('users/top-artists');
});


Route::get('auth/register', function () {
    return view('auth/register');
});
Route::get('auth/login', function () {
    return view('auth/login');
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

Route::get('/users/genres', [MusicGenresController::class, 'index'])->name('music.genres');
Route::get('/users/top-artists', [ArtistController::class, 'index'])->name('topArtists');
Route::get('/users/top-artists/{id}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('/artists/{id}', [ArtistController::class, 'show'])->name('artists.show');

Route::get('/menu', [SearchSongController::class, 'search'])->name('search');

// Route::get('/', function () {
//     return view('404'); // Đây là tên view, ở đây là 'errors.404'
// })->name('not_found');

Route::get('/clear-search', [SearchSongController::class, 'clearSearch'])->name('clear_search');
Route::get('/clear-search/{id}', [SearchSongController::class, 'clearSearch'])->name('clear_search');

//dowload
Route::get('/download/{songId}', [DownloadController::class, 'downloadSong'])->name('song.download');

// routes/web.php

//deleteSearch


Route::post('/menu', [SearchSongController::class, 'destroy'])->name('songs.delete-search');
Route::get('users/languages', [LanguagesController::class, 'index1'])->name('users.languages');













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



    Route::prefix('admin')->group(function () {

        Route::get('/top-artists', [ArtistController::class, 'indexAdmin'])->name('admin.artists.index');
        Route::get('/artists/create/', [ArtistController::class, 'create'])->name('admin.artists.create');
        Route::post('/artists', [ArtistController::class, 'store'])->name('admin.artists.store');
        Route::get('/artists/{id}/edit', [ArtistController::class, 'edit'])->name('admin.artists.edit');
        Route::put('/artists/{id}', [ArtistController::class, 'update'])->name('admin.artists.update');
        Route::delete('/artists/{id}', [ArtistController::class, 'destroy'])->name('admin.artists.destroy');
        Route::get('/old-songs', [OldSongController::class, 'indexAdmin'])->name('admin.old-songs');
        Route::get('/most-searched-song', [SearchSongController::class, 'showMostSearchedSongs'])->name('most-searched-songs');
        Route::put('/song/edit/{id}', [SearchSongController::class, 'showEditSongForm'])->name('song.edit');
        Route::put('/song/update/{id}', [SearchSongController::class, 'updateSong'])->name('song.update');
        Route::delete('/song/delete/{id}', [SearchSongController::class, 'deleteSong'])->name('song.delete');
        Route::post('/song/create', [SearchSongController::class, 'createSong'])->name('song.store');
        Route::get('/song/create', [SearchSongController::class, 'showCreateSongForm'])->name('song.create');
        Route::put('/songs/{id}', [MusicController::class, 'update'])->name('edit-song');
    });


    Route::get('admin/new-releases', [NewReleasesController::class, 'indexAdmin'])->name('admin.new-releases');
    Route::get('/admin/top-ranking', [MusicController::class, 'index'])->name('admin.top-ranking');
    Route::get('/admin/top-ranking/create', function () {
        return view('admin.top-ranking.create');
    })->name('admin.top-ranking.create');
    Route::post('/admin/top-ranking', [MusicController::class, 'store'])->name('admin.top-ranking.store');
    Route::get('/admin/top-ranking/{song}/edit', function (Song $song) {
        return view('admin.top-ranking.edit', compact('song'));
    })->name('admin.top-ranking.edit');
    Route::put('/admin/top-ranking/{song}', [MusicController::class, 'update'])->name('admin.top-ranking.update');
    Route::delete('/admin/top-ranking/{song}', [MusicController::class, 'destroy'])->name('admin.top-ranking.destroy');



    // Route to display old songs
    Route::get('old-songs', [OldSongController::class, 'index'])->name('old-songs.index');

    // Route for editing a specific old song
    Route::get('old-songs/edit/{id}', [OldSongController::class, 'edit'])->name('old-songs.edit');

    //ưefwef
    Route::put('new-releases/{id}', [OldSongController::class, 'update'])->name('new-releases.update');

    // Route to update a specific old song
    Route::put('old-songs/{id}', [MusicController::class, 'update'])->name('old-songs.update');


    // languages
    Route::get('admin/india', [LanguagesController::class, 'index'])->name('admin.India');
    Route::get('admin/vietnam', [LanguagesController::class, 'indexvietnam'])->name('admin.vietnam');



    // Route for editing a specific old song
    Route::get('most-searched-song/edit/{id}', [SongController::class, 'edit'])->name('most-searched-song.edit');

    //ưefwef
    Route::put('most-searched-song/{id}', [SongController::class, 'update'])->name('most-searched-song.update');


    // Route to delete a specific old song
    Route::delete('old-songs/{id}', [OldSongController::class, 'destroy'])->name('old-songs.destroy');
    // Route to delete a specific new releases
    Route::delete('new-releases/{id}', [NewReleasesController::class, 'destroy'])->name('new-releases.destroy');



    Route::delete('india/{id}', [LanguagesController::class, 'destroy'])->name('india.destroy');
    Route::put('india/{id}', [LanguagesController::class, 'update'])->name('india.update');


    Route::delete('vietnam/{id}', [LanguagesController::class, 'destroy'])->name('vietnam.destroy');
    Route::put('vietnam/{id}', [LanguagesController::class, 'update'])->name('vietnam.update');
});



Route::get('/home/login', [AuthController::class, 'register_login'])->name('loginn');