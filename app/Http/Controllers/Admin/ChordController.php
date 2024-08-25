<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chord;
use App\Models\Song;
use Illuminate\Http\Request;

class ChordController extends Controller
{
    public function index()
    {
        $chords = Chord::with('song')->paginate(10);
        $songs = Song::all(); // Lấy tất cả các bài hát để truyền vào view
        return view('admin.chords', compact('chords', 'songs'));
    }

    public function create()
    {
        $songs = Song::all(); // Lấy danh sách các bài hát
        return view('admin.chords.create', compact('songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'song_id' => 'required|exists:songs,id',
            'content' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $chord = new Chord();
        $chord->song_id = $request->song_id;
        $chord->content = $request->content;

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $chord->img = 'images/' . $imageName;
        }

        $chord->save();

        return redirect()->route('admin.chords.index')->with('success', 'Chord created successfully.');
    }

    public function edit($id)
    {
        $chord = Chord::findOrFail($id);
        $songs = Song::all(); // Lấy danh sách các bài hát để truyền vào view
        return view('admin.chords.edit', compact('chord', 'songs'));
    }

    public function update(Request $request, Chord $chord)
    {
        $request->validate([
            'song_id' => 'required|exists:songs,id',
            'content' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $chord->song_id = $request->song_id;
        $chord->content = $request->content;

        if ($request->hasFile('img')) {
            if ($chord->img && file_exists(public_path($chord->img))) {
                unlink(public_path($chord->img));
            }
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $chord->img = 'images/' . $imageName;
        }

        $chord->save();

        return redirect()->route('admin.chords.index')->with('success', 'Chord updated successfully.');
    }

    public function destroy(Chord $chord)
    {
        if ($chord->img && file_exists(public_path($chord->img))) {
            unlink(public_path($chord->img));
        }
        $chord->delete();

        return redirect()->route('admin.chords.index')->with('success', 'Chord deleted successfully.');
    }
}
