<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song; // Make sure you import the Song model or replace it with the correct path to your model

class OldSongController extends Controller
{
    // Method to display old songs for users
    public function index()
    {
        // Retrieve songs released before 2015 for users
        $oldSongs = Song::where('release_year', '<', 2015)->get();

        // Pass the old songs data to the 'users.old-music' view
        return view('users.old-music', ['oldSongs' => $oldSongs]);
    }

    // Method to display old songs for admin
    public function indexAdmin()
    {
        // Retrieve songs released before 2015 for admin
        $songs = Song::where('release_year', '<', 2015)->get();

        // Pass the old songs data to the 'admin.old-songs' view
        return view('admin.old-songs', ['songs' => $songs]);
    }

    // Display the form for creating a new song (for admin)
    public function create()
    {
        return view('admin.songs.create');
    }

    // Update information of an old song (for admin)
    public function update(Request $request, $id)
    {
        // Find the song by its ID
        $song = Song::findOrFail($id);

        // Update song details based on form data
        $song->title = $request->input('title');
        $song->release_year = $request->input('release_year');
        // Other fields to update...

        // Save the updated song information
        $song->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Bài hát đã được cập nhật thành công');
    }

    // Delete an old song (for admin)
    public function destroy($id)
    {
        // Find the song by its ID
        $song = Song::findOrFail($id);

        // Delete the song
        $song->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Bài hát đã được xóa thành công');
    }
}
