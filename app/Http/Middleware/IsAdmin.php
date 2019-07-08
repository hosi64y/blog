<?php

namespace App\Http\Middleware;

use App\Exceptions\AccessDeniedException;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IsAdmin
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

//        if (Auth::user()->type == 'admin'){
        return $next($request);

        if (Gate::allows('is_admin')){

            return $next($request);

        }
        else{

            throw new AccessDeniedException;
        }
    }
}
