<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Hiển thị danh sách các đánh giá và chi tiết của một đánh giá cụ thể.
     */
    public function index(Request $request)
    {
        // Lấy danh sách các đánh giá với thông tin người dùng và bài hát
        $ratings = Rating::with(['user', 'song'])->paginate(10);

        // Biến để lưu trữ thông tin chi tiết của một đánh giá nếu có
        $selectedRating = null;

        // Nếu có tham số id, tìm và gán giá trị cho $selectedRating
        if ($request->has('id')) {
            $selectedRating = Rating::with(['user', 'song'])->find($request->id);
        }

        // Trả về view và truyền các biến $ratings và $selectedRating
        return view('admin.ratings', compact('ratings', 'selectedRating'));
    }
}
