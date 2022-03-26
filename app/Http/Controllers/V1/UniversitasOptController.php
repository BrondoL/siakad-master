<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class UniversitasOptController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/universitas-opt",
     *      tags={"Universitas opt"},
     *      summary="List Universitas opt",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of universitas opt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="id_pt", type="integer", example=""),
     *                      @OA\Property(property="id_universitas", type="integer", example=""),
     *                      @OA\Property(property="is_pmb", type="string", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="info", type="object",
     *                      @OA\Property(property="total", type="integer", example=10),
     *                      @OA\Property(property="page", type="integer", example=1),
     *                      @OA\Property(property="last_page", type="integer", example=1),
     *                      @OA\Property(property="count", type="integer", example=10),
     *                      @OA\Property(property="start", type="integer", example=1),
     *                      @OA\Property(property="end", type="integer", example=10),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from ms_universitas_opt"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/universitas-opt/{id}",
     *     summary="Data Universitas opt",
     *     tags={"Universitas opt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id universitas opt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of universitas opt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="id_pt", type="integer", example=""),
     *                      @OA\Property(property="id_universitas", type="integer", example=""),
     *                      @OA\Property(property="is_pmb", type="string", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM ms_universitas_opt WHERE ms_universitas_opt.id = 1 limit 1"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *     ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\UniversitasOpt] 1"),
     *                          @OA\Property(property="files", type="object",
     *                              @OA\Property(type="string", example="/Users/brondol/Applications/siakadcloud/master/vendor/illuminate/database/Eloquent/Builder.php baris 434"),
     *                          ),
     *                      ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select * from ak_mahasiswa where ak_mahasiswa.id = 1 limit 1"),
     *                      @OA\Property(property="time", type="integer", example=2.25),
     *                  ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     * @OA\Post(
     *     path="/v1/universitas-opt",
     *     summary="Add Universitas opt",
     *     tags={"Universitas opt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="id_universitas", type="integer", example=""),
     *                 @OA\Property(property="is_pmb", type="string", example=""),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new universitas opt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="id_pt", type="integer", example=""),
     *                      @OA\Property(property="id_universitas", type="integer", example=""),
     *                      @OA\Property(property="is_pmb", type="string", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into ms_universitas_opt () values () returning id"),
     *                      @OA\Property(property="time", type="integer", example=8.13),
     *                  ),
     *              ),
     *          ),
     *     ),
     *     @OA\Response(response=400, description="Bad Request",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=400),
     *                      @OA\Property(property="message", type="string", example="Data yang dikirimkan tidak valid"),
     *                      @OA\Property(property="validation", type="object",
     *                          @OA\Property(property="nama_field", type="array",
     *                              @OA\Items(type="string", example="Harus diisi"),
     *                          ),
     *                      ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     * @OA\Put(
     *     path="/v1/universitas-opt/{id}",
     *     summary="Update universitas opt",
     *     tags={"Universitas opt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id universitas opt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="id_universitas", type="integer", example=""),
     *                 @OA\Property(property="is_pmb", type="string", example=""),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Universitas opt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="id_pt", type="integer", example=""),
     *                      @OA\Property(property="id_universitas", type="integer", example=""),
     *                      @OA\Property(property="is_pmb", type="string", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update ms_universitas_opt set ms_universitas_opt.id = 1 where ms_universitas_opt.id = 1"),
     *                      @OA\Property(property="time", type="integer", example=8.13),
     *                  ),
     *              ),
     *          ),
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\UniversitasOpt] 1"),
     *                          @OA\Property(property="files", type="object",
     *                              @OA\Property(type="string", example="/Users/brondol/Applications/siakadcloud/master/vendor/illuminate/database/Eloquent/Builder.php baris 434"),
     *                          ),
     *                      ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select * from ak_mahasiswa where ak_mahasiswa.id = 1 limit 1"),
     *                      @OA\Property(property="time", type="integer", example=2.25),
     *                  ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     * @OA\Delete(
     *     path="/v1/universitas-opt/{id}",
     *     summary="Delete universitas opt",
     *     tags={"Universitas opt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id universitas opt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Universitas opt"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\UniversitasOpt] 1"),
     *                          @OA\Property(property="files", type="object",
     *                              @OA\Property(type="string", example="/Users/brondol/Applications/siakadcloud/master/vendor/illuminate/database/Eloquent/Builder.php baris 434"),
     *                          ),
     *                      ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select * from ak_mahasiswa where ak_mahasiswa.id = 1 limit 1"),
     *                      @OA\Property(property="time", type="integer", example=2.25),
     *                  ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     *     @OA\Schema(
     *         schema="Universitas opt",
     *         @OA\Xml(name="Universitas opt"),
     *         @OA\Property(property="id", type="integer", example=""),
     *         @OA\Property(property="id_pt", type="integer", example=""),
     *         @OA\Property(property="id_universitas", type="integer", example=""),
     *         @OA\Property(property="is_pmb", type="string", example=""),
     *     ),
     */
}
        