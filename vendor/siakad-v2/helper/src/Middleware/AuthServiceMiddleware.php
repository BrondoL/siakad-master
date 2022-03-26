<?php

namespace Siakad\Middleware;

use Closure;

class AuthServiceMiddleware
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
		if (empty($request->user()->service))
			abort(401);

		return $next($request);
	}
}
