<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::with('songs')->paginate(10);
        $songs = Song::all();
        return view('admin.playlist', compact('playlists', 'songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'songs' => 'required|array',
            'songs.*' => 'exists:songs,id',
        ]);

        $playlist = Playlist::create(['name' => $request->name]);
        $playlist->songs()->attach($request->songs);

        return redirect()->route('admin.playlists.index')->with('success', 'Playlist created successfully.');
    }

    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'songs' => 'required|array',
            'songs.*' => 'exists:songs,id',
        ]);

        $playlist->update(['name' => $request->name]);
        $playlist->songs()->sync($request->songs);

        return redirect()->route('admin.playlist.index')->with('success', 'Playlist updated successfully.');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('admin.playlist.index')->with('success', 'Playlist deleted successfully.');
    }

    public function showPlaylists()
    {
        $playlists = Playlist::with('songs')->get();
        return view('playlists', compact('playlists'));
    }
    public function searchPlaylists(Request $request)
    {
        $search = $request->input('search');
       
        $playlists = Playlist::where('name', 'like', '%' . $search . '%')->with('songs')->get();
    
        $message = null;
    
        if ($playlists->isEmpty()) {
            $message = "Không có playlist nào phù hợp với từ khóa.";
        }
    
        return view('playlists', compact('playlists', 'message'));
    }
    
    
    
    
}
