<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all();
        dd($playlists);
        return view('admin.playlist', compact('playlists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        Playlist::create($request->all());

        return redirect()->route('admin.playlist')->with('success', 'Playlist created successfully.');
    }

    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $playlist->update($request->all());

        return redirect()->route('admin.playlist')->with('success', 'Playlist updated successfully.');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('admin.playlist')->with('success', 'Playlist deleted successfully.');
    }
}
