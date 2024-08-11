<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chord;
use App\Models\Song; // Đảm bảo bạn đã có model Song
use Illuminate\Http\Request;

class ChordController extends Controller
{
    public function index()
    {
        $chords = Chord::paginate(10);
        return view('admin.chords', compact('chords'));
    }

    public function create()
    {
        $songs = Song::all(); // Lấy danh sách các bài hát
        return view('admin.chords.create', compact('songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'song_id' => 'nullable|exists:songs,id', // Kiểm tra song_id nếu cần
        ]);

        $chord = new Chord();
        $chord->name = $request->name;
        $chord->content = $request->content;
        $chord->song_id = $request->input('song_id'); // Cung cấp giá trị song_id nếu có

        if ($request->hasFile('img')) {
            $chord->img = $request->file('img')->store('images', 'public');
        }

        $chord->save();

        return redirect()->route('admin.chords.index')->with('success', 'Chord created successfully.');
    }

    public function edit($id)
    {
        $chord = Chord::findOrFail($id);
        $songs = Song::all(); // Lấy danh sách các bài hát
        return view('admin.chords.edit', compact('chord', 'songs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'song_id' => 'nullable|exists:songs,id', // Kiểm tra song_id nếu cần
        ]);

        $chord = Chord::findOrFail($id);
        $chord->name = $request->name;
        $chord->content = $request->content;
        $chord->song_id = $request->input('song_id'); // Cung cấp giá trị song_id nếu có

        if ($request->hasFile('img')) {
            // Xóa hình ảnh cũ nếu có
            if ($chord->img && file_exists(storage_path('app/public/' . $chord->img))) {
                unlink(storage_path('app/public/' . $chord->img));
            }
            $chord->img = $request->file('img')->store('images', 'public');
        }

        $chord->save();

        return redirect()->route('admin.chords.index')->with('success', 'Chord updated successfully.');
    }

    public function destroy($id)
    {
        $chord = Chord::findOrFail($id);
        if ($chord->img && file_exists(storage_path('app/public/' . $chord->img))) {
            unlink(storage_path('app/public/' . $chord->img));
        }
        $chord->delete();

        return redirect()->route('admin.chords.index')->with('success', 'Chord deleted successfully.');
    }
}
