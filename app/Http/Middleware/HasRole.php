<?php

namespace App\Http\Middleware;

use Closure;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('|', $role);
        foreach ($roles as $rolename) {
            if ($request->user()->hasRole($rolename)) {
                return $next($request);
            }
        }

        abort(404);
    }
}
