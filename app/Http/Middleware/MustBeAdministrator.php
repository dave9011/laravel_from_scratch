<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdministrator
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

        $user = $request->user(); //if user is signed in you get user, othwerwise null

        if($user && $user->isAdmin) {
            return $next($request);
        }
        
        abort(404, 'User does not exist or does not have administrator rights.');
    }
}
