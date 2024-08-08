<?php
namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // Retrieves all songs and displays them in the admin top-ranking view
    public function index()
    {
        $songs = Song::all();
        return view('admin.top-ranking', compact('songs'));
    }

    // Renders the form for creating a new song (though it currently doesn't pass any data to the view)
    public function create()
    {
        return view('admin.top-ranking');
    }

    // Handles the creation of a new song
    public function store(Request $request)
    {
        // Creates a new song based on the data received in the request
        Song::create($request->all());

        // Redirects back to the admin top-ranking view with a success message
        return redirect()->route('admin.top-ranking')->with('success', 'Song created successfully.');
    }

    // Renders the form to edit a specific song
    public function edit(Song $song)
    {
        // Passes a single song's data to the view for editing
        return view('admin.top-ranking', compact('song'));
    }

    // Handles updating a song's details
    public function update(Request $request, $id)
    {
        // Finds the song in the database based on its ID
        $song = Song::find($id);

        // Checks if the song exists
        if (!$song) {
            return redirect()->back()->with('error', 'Song not found');
        }

        // Updates the song's attributes based on form data
        $song->title = $request->input('title');
        $song->release_year = $request->input('release_year');
        $song->save();

        // Redirects back to the admin top-ranking view with a success message
        return redirect()->route('admin.top-ranking')->with('success', 'Song updated successfully');
    }

    // Deletes a specific song
    public function destroy(Song $song)
    {
        $song->delete();

        // Redirects back to the admin top-ranking view with a success message
        return redirect()->route('admin.top-ranking')->with('success', 'Song deleted successfully.');
    }
}
