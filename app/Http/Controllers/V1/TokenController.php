<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;
use Siakad\Response;

class TokenController extends Controller
{
    /**
     * @OA\Post(
     *     path="/v1/token/invalidate",
     *     summary="Invalidate Token",
     *     tags={"Token"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Invalidate Token",
     *     ),
     *     @OA\Response(response=401, description="Unauthorized",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=401),
     *                      @OA\Property(property="message", type="string", example="Anda tidak memiliki akses ke sistem."),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select exists(select * from sc_token where token is null) as exists"),
     *                      @OA\Property(property="time", type="integer", example=66.58),
     *                  ),
     *              ),
     *          ),
     *     ),
     * )
     */

    public function goInvalidate()
    {
        return Response::show($this->service->invalidate($this->request->bearerToken()), 200);
    }
}
