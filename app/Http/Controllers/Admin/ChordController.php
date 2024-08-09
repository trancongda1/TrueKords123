<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chord;
use Illuminate\Http\Request;

class ChordController extends Controller
{
    // Hiển thị danh sách các hợp âm
    public function index()
    {
        $chords = Chord::all();
        return view('admin.chords', compact('chords'));
    }

    // Hiển thị form tạo mới hợp âm
    public function create()
    {
        return view('admin.chords');
    }

    // Lưu hợp âm mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'song_id' => 'required|exists:songs,id',
            'name' => 'required|string|max:255',
            'content' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $chord = new Chord();
        $chord->song_id = $request->song_id;
        $chord->name = $request->name;
        $chord->content = $request->content;

        if ($request->hasFile('img')) {
            $chord->img = $request->file('img')->store('images', 'public');
        }

        $chord->save();

        return redirect()->route('admin.chords')->with('success', 'Chord created successfully.');
    }

    // Hiển thị chi tiết hợp âm
    public function show($id)
    {
        $chord = Chord::findOrFail($id);
        return view('admin.chords', compact('chord'));
    }

    // Hiển thị form chỉnh sửa hợp âm
    public function edit($id)
    {
        $chord = Chord::findOrFail($id);
        return view('admin.chords', compact('chord'));
    }

    // Cập nhật hợp âm trong cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        $request->validate([
            'song_id' => 'required|exists:songs,id',
            'name' => 'required|string|max:255',
            'content' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $chord = Chord::findOrFail($id);
        $chord->song_id = $request->song_id;
        $chord->name = $request->name;
        $chord->content = $request->content;

        if ($request->hasFile('img')) {
            // Xóa ảnh cũ nếu có
            if ($chord->img && file_exists(storage_path('app/public/' . $chord->img))) {
                unlink(storage_path('app/public/' . $chord->img));
            }
            $chord->img = $request->file('img')->store('images', 'public');
        }

        $chord->save();

        return redirect()->route('admin.chords')->with('success', 'Chord updated successfully.');
    }

    // Xóa hợp âm khỏi cơ sở dữ liệu
    public function destroy($id)
    {
        $chord = Chord::findOrFail($id);
        // Xóa ảnh nếu có
        if ($chord->img && file_exists(storage_path('app/public/' . $chord->img))) {
            unlink(storage_path('app/public/' . $chord->img));
        }
        $chord->delete();

        return redirect()->route('admin.chords')->with('success', 'Chord deleted successfully.');
    }
}
