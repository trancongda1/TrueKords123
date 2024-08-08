<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Song;

class LanguagesController extends Controller
{
    // Admin section: Retrieving songs by language

    // Private method to get songs by language ID
    private function getSongsByLanguage($languageId)
    {
        $language = Language::find($languageId);

        if ($language) {
            return $language->songs; // Retrieve songs associated with the language
        } else {
            return [];
        }
    }

    // Method to display songs of the Indian language for admin
    public function index()
    {
        $songs = $this->getSongsByLanguage(1); // Retrieve songs for the Indian language

        return view('admin.India', compact('songs')); // Display Indian songs for admin
    }

    // Method to update song information for admin
    public function update(Request $request, $id)
    {
        $song = Song::findOrFail($id);

        // Update song details based on user input
        $song->title = $request->input('title');
        $song->artist_id = $request->input('artist_id');
        $song->language_id = $request->input('language_id');
        $song->save();

        return redirect()->back()->with('success', 'Song information updated successfully');
    }

    // Method to delete a song for admin
    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete(); // Delete the song

        return redirect()->route('admin.India')->with('success', 'Song has been deleted successfully!');
    }

    // Method to display songs of the Vietnamese language for admin
    public function indexVietnam()
    {
        $songs = $this->getSongsByLanguage(2); // Retrieve songs for the Vietnamese language

        return view('admin.vietnam', compact('songs')); // Display Vietnamese songs for admin
    }


    // User section: Retrieving songs by language for users

    // Method to display songs for users categorized by language
    public function index1()
    {
        $songsIndia = Song::where('language_id', 1)->get(); // Retrieve songs for the Indian language
        $songsVietnam = Song::where('language_id', 2)->get(); // Retrieve songs for the Vietnamese language

        return view('users.languages', compact('songsIndia', 'songsVietnam')); // Display songs categorized by language for users
    }
}
