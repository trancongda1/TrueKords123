<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

// Controller for users
class SongController extends Controller
{
    // Displays most searched songs for users
    public function mostSearchedSongs()
    {
        // Retrieve songs with a search count greater than 10 from the database
        $mostSearchedSongs = Song::where('search_count', '>', 10)->get();

        // Return the 'users.most-searched-song' view with the list of most searched songs
        return view('users.most-searched-song', ['mostSearchedSongs' => $mostSearchedSongs]);
    }

    // Updates song information based on user input
    public function update(Request $request, $id)
    {
        // Find the song by its ID
        $song = Song::findOrFail($id);

        // Update the song title based on user input
        $song->title = $request->input('title');

        // Save the updated song information
        $song->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Bài hát đã được cập nhật thành công');
    }
}
