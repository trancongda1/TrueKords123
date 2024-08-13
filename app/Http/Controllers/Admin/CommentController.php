<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Song;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($songId)
    {
        $comments = Comment::where('song_id', $songId)->get();
        return view('chords', [
            'comments' => $comments,
            'songId' => $songId,
            'song' => Song::find($songId)
        ]);
    }

    // Xử lý việc lưu bình luận mới
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'song_id' => 'required',
            'content' => 'required|string|max:255',
        ]);

        Comment::create($request->all());

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment->update($request->all());

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'chord_id' => 'required|exists:chords,id'
        ]);

        Comment::create($request->all());
        return redirect()->route('comments.index')->with('success', 'Đã thêm bình luận thành công!');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
            'chord_id' => 'required|exists:chords,id'
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return redirect()->route('comments.index')->with('success', 'Cập nhật bình luận thành công!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Đã xóa bình luận thành công!');
    }
}
