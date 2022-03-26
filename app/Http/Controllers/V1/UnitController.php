<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;
use Siakad\Response;

class UnitController extends Controller
{
	/**
	 * Refresh cache
	 */
	public function goCache()
	{
		return Response::show($this->service->cache());
	}
}
