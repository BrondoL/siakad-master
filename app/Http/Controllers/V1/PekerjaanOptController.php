<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class PekerjaanOptController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/pekerjaan-opt",
     *      tags={"Pekerjaan opt"},
     *      summary="List Pekerjaan opt",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of pekerjaan opt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_pt", type="integer", example=1),
     *                      @OA\Property(property="id_pekerjaan", type="integer", example=1),
     *                      @OA\Property(property="kode_emis", type="string", example="12"),
     *                      @OA\Property(property="kode_emis_mhs", type="string", example="5"),
     *                      @OA\Property(property="kode_emis_lulusan", type="string", example="18"),
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
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from lv_pekerjaan_opt"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/pekerjaan-opt/{id}",
     *     summary="Data Pekerjaan opt",
     *     tags={"Pekerjaan opt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id pekerjaan opt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of pekerjaan opt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_pt", type="integer", example=1),
     *                      @OA\Property(property="id_pekerjaan", type="integer", example=1),
     *                      @OA\Property(property="kode_emis", type="string", example="12"),
     *                      @OA\Property(property="kode_emis_mhs", type="string", example="5"),
     *                      @OA\Property(property="kode_emis_lulusan", type="string", example="18"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM lv_pekerjaan_opt WHERE lv_pekerjaan_opt.id = 1 limit 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\PekerjaanOpt] 1"),
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
     *     path="/v1/pekerjaan-opt",
     *     summary="Add Pekerjaan opt",
     *     tags={"Pekerjaan opt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     * required={"id_pekerjaan"},
     *                 @OA\Property(property="id_pekerjaan", type="integer", example=1),
     *                 @OA\Property(property="kode_emis", type="string", example="12"),
     *                 @OA\Property(property="kode_emis_mhs", type="string", example="5"),
     *                 @OA\Property(property="kode_emis_lulusan", type="string", example="18"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new pekerjaan opt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_pt", type="integer", example=1),
     *                      @OA\Property(property="id_pekerjaan", type="integer", example=1),
     *                      @OA\Property(property="kode_emis", type="string", example="12"),
     *                      @OA\Property(property="kode_emis_mhs", type="string", example="5"),
     *                      @OA\Property(property="kode_emis_lulusan", type="string", example="18"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into lv_pekerjaan_opt () values () returning id"),
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
     *     path="/v1/pekerjaan-opt/{id}",
     *     summary="Update pekerjaan opt",
     *     tags={"Pekerjaan opt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id pekerjaan opt",
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
     *                 @OA\Property(property="id_pekerjaan", type="integer", example=1),
     *                 @OA\Property(property="kode_emis", type="string", example="12"),
     *                 @OA\Property(property="kode_emis_mhs", type="string", example="5"),
     *                 @OA\Property(property="kode_emis_lulusan", type="string", example="18"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Pekerjaan opt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_pt", type="integer", example=1),
     *                      @OA\Property(property="id_pekerjaan", type="integer", example=1),
     *                      @OA\Property(property="kode_emis", type="string", example="12"),
     *                      @OA\Property(property="kode_emis_mhs", type="string", example="5"),
     *                      @OA\Property(property="kode_emis_lulusan", type="string", example="18"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update lv_pekerjaan_opt set lv_pekerjaan_opt.id = 1 where lv_pekerjaan_opt.id = 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\PekerjaanOpt] 1"),
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
     *     path="/v1/pekerjaan-opt/{id}",
     *     summary="Delete pekerjaan opt",
     *     tags={"Pekerjaan opt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id pekerjaan opt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Pekerjaan opt"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\PekerjaanOpt] 1"),
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
     *         schema="Pekerjaan opt",
     *         @OA\Xml(name="Pekerjaan opt"),
     * required={"id_pekerjaan"},
     *         @OA\Property(property="id", type="integer", example=1),
     *         @OA\Property(property="id_pt", type="integer", example=1),
     *         @OA\Property(property="id_pekerjaan", type="integer", example=1),
     *         @OA\Property(property="kode_emis", type="string", example="12"),
     *         @OA\Property(property="kode_emis_mhs", type="string", example="5"),
     *         @OA\Property(property="kode_emis_lulusan", type="string", example="18"),
     *     ),
     */
}
