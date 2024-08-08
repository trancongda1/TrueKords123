<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song; // Ensure you've imported the Song model

class TopRankingController extends Controller
{
    public function index()
    {
        // Retrieves a list of songs ordered by search_count (or any other custom logic)
        // Includes comments related to each song (assuming a relationship is defined)
        $songs = Song::orderBy('search_count', 'desc')->with('comments')->get();
        return view('users.top-ranking', compact('songs'));
    }

    // Other functions like store, edit, update, destroy can be added as needed

    // Example function handling the increase of search_count when a song is viewed
    public function show($id)
    {
        // Find the song by its ID
        $song = Song::findOrFail($id);

        // Increase the value of search_count each time the song is viewed
        $song->search_count += 1;
        $song->save();

        return view('users.top-ranking', compact('songs')); // Assuming this should return the updated song list
    }
}
