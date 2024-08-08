<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user has an admin role (assuming 'role' field is used for role identification)
            if ($user->role === 1) {
                // Allow the request to proceed to the next middleware or route handler
                return $next($request);
            }

            // User does not have admin rights, may redirect or display an error message for restricted access
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }

        // If the user is not logged in, may redirect to the login page
        return redirect('/login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
    }
}
