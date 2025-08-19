<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect("login");
        }

        // Check if the user status is '0'
        if (Auth::user()->user_status == '0') {
            return redirect('ver-account');
        }

        // Redirect to home if user status is '1'
        // if (Auth::user()->user_status == '1') {
        //     return redirect('user/home'); // Change this route if necessary
        // }

        // Proceed with the request for other user statuses
        return $next($request);
    }
}
