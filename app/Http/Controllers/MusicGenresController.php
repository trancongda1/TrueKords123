<?php

namespace App\Http\Controllers;

use App\Models\Genres; // Importing the Genres model
use Illuminate\Http\Request;

class MusicGenresController extends Controller
{
    // Method to display all music genres to users
    public function index()
    {
        // Retrieve all genres from the Genres model
        $genres = Genres::all();

        // Pass the genres data to the 'users.genres' view
        return view('users.genres', compact('genres'));
    }
}
