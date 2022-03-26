<?php

namespace Siakad\Middleware;

use Closure;

class AuthUserMiddleware
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
		if (!$request->user())
			abort(401);

		return $next($request);
	}
}
