<?php

namespace App\Http\Middleware;

use Closure;

use \Illuminate\Support\Facades\Auth;

class CheckIsAdmin
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
        $objUser = Auth::user();

        if(!$objUser->hasRole('admin'))
            return redirect()->route('forum.index');

        return $next($request);
    }
}
