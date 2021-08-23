<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::user()->quyen == 1)
        {
            return $next($request);
        }
        else
        {
            Auth::logout();
            return redirect('admin/login')->with('fails', 'Bạn cần đăng nhập với quyền admin');
        }
    }
}
