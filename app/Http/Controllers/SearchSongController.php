<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SearchSongController extends Controller
{
    // Displays songs that are most searched (for admin)
    public function showMostSearchedSongs()
    {
        // Retrieve songs with a search count greater than 10
        $songs = Song::where('search_count', '>', 10)->get();

        // Pass the songs data to the 'admin.most-searched-song' view
        return view('admin.most-searched-song', ['songs' => $songs]);
    }

    // Shows the form to edit a specific song (for admin)
    public function showEditSongForm($id)
    {
        // Find the song by its ID
        $song = Song::findOrFail($id);

        // Pass the song data to the 'admin.most-searched-song' view
        return view('admin.most-searched-song', ['song' => $song]);
    }

    // Updates song information (for admin)
    public function updateSong(Request $request, $id)
    {
        // Find the song by its ID
        $song = Song::findOrFail($id);

        // Update song details based on form data
        $song->update($request->all());

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Bài hát đã được cập nhật thành công!');
    }

    // Deletes a song (for admin)
    public function deleteSong($id)
    {
        // Delete the song by its ID
        Song::destroy($id);

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Bài hát đã được xoá thành công!');
    }

    // Creates a new song (for admin)
    public function createSong(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'release_year' => 'required|numeric',
            'audio_path' => 'required',
            // Add validation for other fields here
        ]);

        // Create a new song based on the validated data
        $newSong = Song::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Bài hát đã được thêm thành công!');
    }

    // Searches for songs based on the provided search term
    public function search(Request $request)
    {
        // Retrieve the search term from the request
        $searchTerm = $request->input('search');

        // Search for songs with titles containing the search term
        $songs = Song::where('title', 'LIKE', '%' . $searchTerm . '%')->get();

        // Increment the search count for each found song and display results
        if ($songs->isNotEmpty()) {
            $songs->each->increment('search_count');
            return view('/menu', ['songs' => $songs]); // Return view with search results
        } else {
            // Flash a message if no songs are found
            session()->flash('message', 'Không tìm thấy bài hát');
            return redirect()->back(); // Redirect back with a message
        }
    }

    // Resets the search count of a specific song to zero (for admin)
    public function destroy(Request $request)
    {
        // Retrieve the title of the song from the request
        $title = $request->input('title');

        // Find the song by its title
        $song = Song::where('title', $title)->first();

        // Reset the search count of the song
        if ($song) {
            $song->search_count = 0;
            $song->save();
            return redirect()->back()->with('success', 'Lượt tìm kiếm đã được xoá thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy bài hát để xoá lượt tìm kiếm.');
        }
    }
}
