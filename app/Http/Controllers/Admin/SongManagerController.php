<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class SongManagerController extends Controller
{
    // Hiển thị danh sách bài hát với phân trang
    public function index()
    {
        $songs = Song::paginate(5);
        return view('admin.song_manager', compact('songs'));
    }

    // Hiển thị danh sách bài hát cho người dùng
    public function userIndex()
    {
        $songs = Song::all(); 
        return view('songs', compact('songs'));
    }

    // Hiển thị form tạo bài hát mới
    public function create()
    {
        return view('admin.song_manager');
    }

    // Lưu bài hát mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'nullable|string',
        ]);

        // Tạo bài hát mới
        Song::create($request->all());

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('admin.songs.index')->with('success', 'Song created successfully.');
    }

    // Hiển thị chi tiết một bài hát cụ thể
    public function show(Song $song)
    {
        return view('admin.song_manager', compact('song'));
    }

    // Hiển thị form chỉnh sửa bài hát
    public function edit(Song $song)
    {
        return view('admin.song_manager', compact('song'));
    }

    // Cập nhật bài hát trong cơ sở dữ liệu
    public function update(Request $request, Song $song)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'nullable|string',
        ]);

        // Cập nhật dữ liệu bài hát
        $song->update($request->all());

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('admin.songs.index')->with('success', 'Song updated successfully.');
    }

    // Xóa bài hát khỏi cơ sở dữ liệu
    public function destroy(Song $song)
    {
        // Xóa bài hát
        $song->delete();

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('admin.songs.index')->with('success', 'Song deleted successfully.');
    }
}
