<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;

class AutoLogout
{
    protected $timeout=900;
    public function __construct()
    {
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('lastActivityTime')) {
            # code...
            Session::put('lastActivityTime',time());
        }
        elseif (time()-Session::get('lastActivityTime')> $this->getTimeOut()) {
            # code...
            Session::forget('lastActivityTime');
            Auth::logout();
            return redirect('dangnhap')->with('thongbao','Bạn đã không hoạt động 15 phút');
        }
        Session::put('lastActivityTime',time());
        return $next($request);
    }

    protected function getTimeOut(){
        return (env('TIMEOUT')) ?: $this->timeout;
    }
}
