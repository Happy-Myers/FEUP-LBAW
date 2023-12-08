<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Closure $next)
    {
        if(auth()->check() && auth()->user->hasRole('Admin')){
            return $next(request());
        }

        return redirect('/');        
    }
}
