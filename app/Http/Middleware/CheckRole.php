<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleHandle)
    {
        //- If the currently logged in user does not have the required role - deny him access
        if (! \Auth::User()->hasRole($roleHandle)) {
            return response('Insufficient privs.', 401);
        }

        return $next($request);
    }
}
