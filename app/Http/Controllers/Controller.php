<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *   title="Dokumentasi API pada Service Master",
     *   version="1.0",
     *   description="Service master merupakan service yang mengelola data-data master dalam JSON format",
     *   @OA\Contact(
     *     email="nabilunited2@gmail.com",
     *     name="Developer"
     *   )
     * )
     * @OA\SecurityScheme(
     *   securityScheme="bearerAuth",
     *   in="header",
     *   name="Authorization",
     *   type="http",
     *   scheme="bearer",
     *   bearerFormat="JWT",
     * ),
     */
}
