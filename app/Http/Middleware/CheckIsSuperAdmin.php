<?php

namespace App\Http\Middleware;

use Closure;

use \Illuminate\Support\Facades\Auth;

class CheckIsSuperAdmin
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

        if(!$objUser->level > 2)
            return redirect()->route('forum.index');

        return $next($request);
    }
}
