<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class ApiVerification
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
        $user = User::where('api_token', '=', $request->header('Authorization'))->first();
        if(is_null($user)){
            return abort(401);
        }
        Auth::setUser($user);
        return $next($request);
    }
}
