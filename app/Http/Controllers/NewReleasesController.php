<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class NewReleasesController extends Controller
{
    // Method to display new releases for users
    public function index()
    {
        // Retrieve songs released after 2022
        $songs = Song::where('release_year', '>', 2022)->get();

        // Pass the songs data to the 'users.new-releases' view
        return view('users.new-releases', ['songs' => $songs]);
    }

    // Method to display new releases for admin
    public function indexAdmin()
    {
        // Retrieve songs released after 2022 for admin
        $songs = Song::where('release_year', '>', 2022)->get();

        // Pass the songs data to the 'admin.new-releases' view
        return view('admin.new-releases', ['songs' => $songs]);
    }

    // Method to delete a specific song for admin
    public function destroy($id)
    {
        // Find the song by its ID
        $song = Song::findOrFail($id);

        // Delete the song
        $song->delete();

        // Redirect to the admin new-releases view with a success message
        return redirect()->route('admin.new-releases')
            ->with('success', 'Bài hát đã được xoá thành công!');
    }

    // Method to update song information for admin
    public function update(Request $request, $id)
    {
        // Find the song by its ID
        $song = Song::findOrFail($id);

        // Update song details based on form data
        $song->title = $request->input('title');
        $song->release_year = $request->input('release_year');

        // Save the updated song information
        $song->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thông tin bài hát đã được cập nhật thành công');
    }
}
