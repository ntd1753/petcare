<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorMiddleware
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
        if (!Auth::check() || !Auth::user()->hasRole('doctor')) {
            // Nếu người dùng không phải là doctor, có thể chuyển hướng hoặc trả về lỗi
            return redirect('/')->with('error', 'You do not have permission to access this page.');
        }

}
