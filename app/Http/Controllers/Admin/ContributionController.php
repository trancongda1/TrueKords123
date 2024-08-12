<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserContribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributionController extends Controller
{
    public function index(Request $request)
    {
        $contributions = UserContribution::paginate(10);
        $selectedContribution = null;

        if ($request->has('id')) {
            $selectedContribution = UserContribution::find($request->id);
        }

        return view('admin.contribution', compact('contributions', 'selectedContribution'));
    }
 

    // Hiển thị danh sách các đóng góp của người dùng hiện tại
    public function indexUser()
    {
        if (!Auth::check()) {
            return redirect('/register');  // Chuyển hướng đến trang đăng ký nếu chưa đăng nhập
        }

        $contributions = UserContribution::where('user_id', auth()->id())->get();
        return view('contribute', compact('contributions'));
    }

    // Hiển thị form để tạo một đóng góp mới
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/register');  // Chuyển hướng đến trang đăng ký nếu chưa đăng nhập
        }

        return view('contribute');
    }

    // Lưu đóng góp mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/register');  // Chuyển hướng đến trang đăng ký nếu chưa đăng nhập
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string',
        ]);

        UserContribution::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'approved' => $request->has('approval'),
        ]);

        return redirect()->route('contributions.indexUser')->with('success', 'Đóng góp đã được tạo thành công.');
    }
    
}
