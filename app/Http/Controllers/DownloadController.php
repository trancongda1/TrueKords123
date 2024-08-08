<?php
namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function downloadSong($songId)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            // Redirect to the login page with an error message if the user is not logged in
            return redirect()->route('register')->with('error', 'Bạn cần đăng nhập để download bài hát.');
        }

        // Find the song by its ID
        $song = Song::find($songId);

        if (!$song) {
            // Redirect back with an error message if the song is not found
            return redirect()->back()->with('error', 'Không tìm thấy bài hát.');
        }

        // Get the file path of the song in storage or public directory
        $filePath = $song->audio_path; // Replace with the actual field containing the song's file path

        // Record the download in the database
        $this->recordDownload($songId);

        // Download the song file to the user's machine
        return response()->download($filePath);
    }

    // Function to record the download in the database
    private function recordDownload($songId)
    {
        $userId = Auth::id();
        Download::create([
            'user_id' => $userId,
            'song_id' => $songId,
        ]);
    }
}
