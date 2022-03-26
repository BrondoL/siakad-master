<?php

namespace Siakad\Middleware;

use Closure;

class AuthRoleMiddleware
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
		if (empty($request->user()->id_role_pt) and empty($request->user()->service))
			abort(401);

		return $next($request);
	}
}
