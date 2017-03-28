<?php

namespace App\Http\Middleware;

use Closure;

use \Illuminate\Support\Facades\Auth;

class CheckIsOwner
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

        if(!$objUser->hasRole('owner'))
            return redirect()->route('forum.index');

        return $next($request);
    }
}
