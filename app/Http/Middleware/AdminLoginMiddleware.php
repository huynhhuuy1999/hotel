<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user=Auth::user();
            if($user->name!=null&&$user->name!="")
                return $next($request);
            else{
            # code...
                return redirect('dangnhap');
            }
        }
        else{
            return redirect('dangnhap');
        }
        return $next($request);
    }
}
