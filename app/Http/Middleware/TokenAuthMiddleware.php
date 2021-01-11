<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
	    if ($request->hasHeader("Authorization")) {
		    $id=User::where("remember_token",$request->header("Authorization"))->value("id");

		    if(isset($id))
		    {
			    Auth::loginUsingId($id);
			    return $next($request);
		    }
	    }

	    abort(404);
    }
}
