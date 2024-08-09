<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class SongManagerController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('admin.song_manager', compact('songs'));
    }
    

    // Hiển thị form tạo bài hát mới
    public function create()
    {
        dd(1);
        return view('admin.song_manager');
    }

    // Lưu bài hát mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Song::create($request->all());

        return redirect()->route('admin.songs.index')->with('success', 'Song created successfully.');
    }

    // Hiển thị chi tiết một bài hát cụ thể
    public function show(Song $song)
    {
        dd(1);
        return view('admin.song_manager', compact('song'));
    }

    // Hiển thị form chỉnh sửa bài hát
    public function edit(Song $song)
    {
        dd(1);
        return view('admin.song_manager', compact('song'));
    }

    // Cập nhật bài hát trong cơ sở dữ liệu
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $song->update($request->all());

        return redirect()->route('admin.songs.index')->with('success', 'Song updated successfully.');
    }

    // Xóa bài hát khỏi cơ sở dữ liệu
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('admin.songs.index')->with('success', 'Song deleted successfully.');
    }
}
