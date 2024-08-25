<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all ratings with related songs and users
        $ratings = Rating::select('song_id', \DB::raw('AVG(rating) as average_rating'))
            ->groupBy('song_id')
            ->with(['song'])
            ->paginate(10);
    
        $selectedRating = null;
        if ($request->has('id')) {
            $selectedRating = Rating::with(['song', 'user'])->find($request->id);
        }
    
        return view('admin.ratings', compact('ratings', 'selectedRating'));
    }
    
    

    public function store(Request $request)
    {
        if (!Auth::check()) {
            // Lưu URL hiện tại để quay lại sau khi đăng nhập
            $request->session()->put('url.intended', url()->previous());
            return redirect()->route('register')->with('message', 'Vui lòng đăng nhập để đánh giá.');
        }
        
        $request->validate([
            'song_id' => 'required|exists:songs,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        $userId = Auth::id();
        
        $rating = Rating::updateOrCreate(
            ['user_id' => $userId, 'song_id' => $request->song_id],
            ['rating' => $request->rating]
        );
    
        return redirect()->back()->with('message', 'Cảm ơn bạn đã đánh giá! Chúng tôi ghi nhận đánh giá');
    }
    
    
}
