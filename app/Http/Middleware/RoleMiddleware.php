<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(!Auth::check()){
            return redirect('/admin/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = Auth::user();

        if(!in_array($user->role, $roles)){
            return redirect('/admin/login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        // $user = Auth::user();

        // if (!$user || !in_array($user->role, $roles)) {
        //     // Jika role tidak sesuai, redirect atau abort 403
        //     abort(403, 'Unauthorized'); 
        // }

        return $next($request);
    }
}