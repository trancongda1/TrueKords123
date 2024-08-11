<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        $likes = Like::with(['user', 'song'])->paginate(10);
        $selectedLike = null;

        if ($request->has('id')) {
            $selectedLike = Like::with(['user', 'song'])->find($request->id);
        }

        return view('admin.like', compact('likes', 'selectedLike'));
    }
}
