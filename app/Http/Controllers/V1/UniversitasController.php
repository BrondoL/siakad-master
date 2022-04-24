<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class UniversitasController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/universitas",
     *      tags={"Universitas"},
     *      summary="List Universitas",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of universitas.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_universitas", type="string", example="001001"),
     *                      @OA\Property(property="nama_universitas", type="string", example="Universitas Gadjah Mada"),
     *                      @OA\Property(property="alamat", type="string", example="Bulaksumur"),
     *                      @OA\Property(property="telepon", type="string", example="0274-6492599"),
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
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from ms_universitas"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/universitas/{id}",
     *     summary="Data Universitas",
     *     tags={"Universitas"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id universitas",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of universitas.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_universitas", type="string", example="001001"),
     *                      @OA\Property(property="nama_universitas", type="string", example="Universitas Gadjah Mada"),
     *                      @OA\Property(property="alamat", type="string", example="Bulaksumur"),
     *                      @OA\Property(property="telepon", type="string", example="0274-6492599"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM ms_universitas WHERE ms_universitas.id = 1 limit 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\Universitas] 1"),
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
     *     path="/v1/universitas",
     *     summary="Add Universitas",
     *     tags={"Universitas"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     * required={"kode_universitas", "nama_universitas"},
     *                 @OA\Property(property="kode_universitas", type="string", example="001001"),
     *                 @OA\Property(property="nama_universitas", type="string", example="Universitas Gadjah Mada"),
     *                 @OA\Property(property="alamat", type="string", example="Bulaksumur"),
     *                 @OA\Property(property="telepon", type="string", example="0274-6492599"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new universitas.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_universitas", type="string", example="001001"),
     *                      @OA\Property(property="nama_universitas", type="string", example="Universitas Gadjah Mada"),
     *                      @OA\Property(property="alamat", type="string", example="Bulaksumur"),
     *                      @OA\Property(property="telepon", type="string", example="0274-6492599"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into ms_universitas () values () returning id"),
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
     *     path="/v1/universitas/{id}",
     *     summary="Update universitas",
     *     tags={"Universitas"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id universitas",
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
     *                 @OA\Property(property="kode_universitas", type="string", example="001001"),
     *                 @OA\Property(property="nama_universitas", type="string", example="Universitas Gadjah Mada"),
     *                 @OA\Property(property="alamat", type="string", example="Bulaksumur"),
     *                 @OA\Property(property="telepon", type="string", example="0274-6492599"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Universitas.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_universitas", type="string", example="001001"),
     *                      @OA\Property(property="nama_universitas", type="string", example="Universitas Gadjah Mada"),
     *                      @OA\Property(property="alamat", type="string", example="Bulaksumur"),
     *                      @OA\Property(property="telepon", type="string", example="0274-6492599"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update ms_universitas set ms_universitas.id = 1 where ms_universitas.id = 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\Universitas] 1"),
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
     *     path="/v1/universitas/{id}",
     *     summary="Delete universitas",
     *     tags={"Universitas"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id universitas",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Universitas"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\Universitas] 1"),
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
     *         schema="Universitas",
     *         @OA\Xml(name="Universitas"),
     *         @OA\Property(property="id", type="integer", example=1),
     * required={"kode_universitas", "nama_universitas"},
     *         @OA\Property(property="kode_universitas", type="string", example="001001"),
     *         @OA\Property(property="nama_universitas", type="string", example="Universitas Gadjah Mada"),
     *         @OA\Property(property="alamat", type="string", example="Bulaksumur"),
     *         @OA\Property(property="telepon", type="string", example="0274-6492599"),
     *     ),
     */
}
