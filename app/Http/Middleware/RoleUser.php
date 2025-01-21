<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role_id): Response
    {
        if(auth()->user()->role_id == $role_id){
            return $next($request);
        }

        if(auth()->user()->role_id === 1){
            return redirect('home-admin');
        }else{
            return redirect('/');
        }
    }
}
