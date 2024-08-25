<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class SongManagerController extends Controller
{
    public function index(Request $request)
    {
        $query = Song::query();
    
        // Kiểm tra xem có yêu cầu sắp xếp theo `created_at` trước không
        if ($request->has('sort_created_at')) {
            $sortCreatedAt = $request->input('sort_created_at', 'desc');
            $query->orderBy('created_at', $sortCreatedAt);
        }
    
        // Sắp xếp theo title (A → Z hoặc Z → A) nếu có yêu cầu, hoặc mặc định theo title
        if ($request->has('sort_title')) {
            $sortTitle = $request->input('sort_title', 'asc');
            $query->orderBy('title', $sortTitle);
        } else {
            $query->orderBy('title', 'asc');
        }
    
        // Thực hiện phân trang và lấy kết quả
        $songs = $query->paginate(10);
    
        return view('admin.song_manager', compact('songs'));
    }
    

    // Hiển thị danh sách bài hát cho người dùng
    public function userIndex()
    {
        $songs = Song::all();
        return view('songs', compact('songs'));
    }

    // Hiển thị danh sách bài hát cho người dùng và tìm kiếm
    public function searchIndex(Request $request)
    {
        // Kiểm tra nếu có từ khóa tìm kiếm
        $query = Song::query();
        if ($request->has('textSearch')) {
            $query->where('title', 'like', '%' . $request->input('textSearch') . '%');
        }

        // Lấy tất cả bài hát hoặc theo từ khóa tìm kiếm
        $songs = $query->paginate(10);
        return view('songs', compact('songs'));
    }

    // hiển thị hợp âm bài hát
    public function showChords($id)
    {
        $song = Song::findOrFail($id);
        $chords = $song->chords; // Lấy danh sách các hợp âm của bài hát
        return view('chords', compact('song', 'chords'));
    }

    // Hiển thị form tạo bài hát mới
    public function create()
    {
        return view('admin.song_manager');
    }

    // Lưu bài hát mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
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
