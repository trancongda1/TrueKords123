<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();


            if ($user->role === 1) {

                return $next($request);
            }


            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }

        return redirect('/login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
    }
}
