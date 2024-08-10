<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Process liking a song.
     *
     * @param  int  $songId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function likeSong($songId)
    {
        // Check if the user is logged in
        if (!auth()->check()) {
            // If not logged in, redirect to the login page with an error message
            return redirect()->route('register')->with('error', 'Bạn cần đăng nhập để thích bài hát.');
        }

        $userId = auth()->user()->id; // Get user_id of the logged-in user

        // Check if the user has already liked this song
        $existingLike = Like::where('user_id', $userId)
            ->where('song_id', $songId)
            ->first();

        if (!$existingLike) {
            // If not liked, create a record in the likes table
            Like::create([
                'user_id' => $userId,
                'song_id' => $songId,
            ]);

            // Increase the number of likes in the songs table
            $song = Song::find($songId);

            if ($song) {
                $song->increment('likes');
            }
        }

        // Redirect the user back to the songs list or the song details page
        return redirect()->back()->with('success', 'Bạn đã thích bài hát thành công.');
    }
}
