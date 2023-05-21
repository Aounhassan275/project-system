<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Prospect
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
        if (!Auth::check())
            return redirect()->to(url('/'));

        $user_role = Auth::user()->getRole();
        if($user_role == 'Prospect')
        {
            return $next($request);
        }else{
            return redirect()->to(url('/'));
        }
    }
}
