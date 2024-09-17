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
        // Sắp xếp các đóng góp chưa được phê duyệt lên trước
        $contributions = UserContribution::orderBy('approved', 'asc')->paginate(10);
        $selectedContribution = null;

        if ($request->has('id')) {
            $selectedContribution = UserContribution::find($request->id);
        }

        return view('admin.contribution', compact('contributions', 'selectedContribution'));
    }


    // Hiển thị danh sách các đóng góp hợp âm của người dùng hiện tại
    public function indexUser()
    {
        if (!Auth::check()) {
            return redirect('/register');  // Chuyển hướng đến trang đăng ký nếu chưa đăng nhập
        }

        $contributions = UserContribution::where('user_id', auth()->id())->get();
        return view('contribute', compact('contributions'));
    }

    // Hiển thị form để tạo một đóng góp mới về hợp âm
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/register');  // Chuyển hướng đến trang đăng ký nếu chưa đăng nhập
        }

        return view('contribute');
    }

    // Lưu đóng góp mới về hợp âm vào cơ sở dữ liệu
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/register');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'youtube_link' => 'required|url', // Thêm validate cho link YouTube
        ]);
        
        UserContribution::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'youtube_link' => $request->youtube_link, // Lưu link YouTube vào cơ sở dữ liệu
            'approved' => $request->has('approval'),
        ]);

        return redirect()->route('contributions.indexUser')->with('success', 'Đóng góp của bạn đã được gửi thành công.');
    }



    // Phê duyệt một góp ý về hợp âm
    public function approve($id)
    {
        $contribution = UserContribution::findOrFail($id);
        $contribution->approved = true;
        $contribution->save();

        return redirect()->route('admin.contributions.index')->with('success', 'Góp ý về hợp âm đã được phê duyệt.');
    }

    public function destroy($id)
    {
        $contribution = UserContribution::findOrFail($id);
        $contribution->delete();

        return redirect()->route('admin.contributions.index')->with('success', 'Góp ý về hợp âm đã bị xóa.');
    }
}
