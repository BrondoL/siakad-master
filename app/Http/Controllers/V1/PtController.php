<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class PtController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/pt",
     *      tags={"Pt"},
     *      summary="List Pt",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_pt", type="string", example="1"),
     *                      @OA\Property(property="nama_pt", type="string", example="Universitas Lampung"),
     *                      @OA\Property(property="is_fakultas", type="string", example="1"),
     *                      @OA\Property(property="is_jurusan", type="string", example="1"),
     *                      @OA\Property(property="id_yayasan", type="integer", example=1),
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
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from ms_pt"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/pt/{id}",
     *     summary="Data Pt",
     *     tags={"Pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id pt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_pt", type="string", example="1"),
     *                      @OA\Property(property="nama_pt", type="string", example="Universitas Lampung"),
     *                      @OA\Property(property="is_fakultas", type="string", example="1"),
     *                      @OA\Property(property="is_jurusan", type="string", example="1"),
     *                      @OA\Property(property="id_yayasan", type="integer", example=1),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM ms_pt WHERE ms_pt.id = 1 limit 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\Pt] 1"),
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
     *     path="/v1/pt",
     *     summary="Add Pt",
     *     tags={"Pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     * required={"kode_pt", "nama_pt", "is_fakultas", "is_jurusan"},
     *                 @OA\Property(property="kode_pt", type="string", example="1"),
     *                 @OA\Property(property="nama_pt", type="string", example="Universitas Lampung"),
     *                 @OA\Property(property="is_fakultas", type="string", example="1"),
     *                 @OA\Property(property="is_jurusan", type="string", example="1"),
     *                 @OA\Property(property="id_yayasan", type="integer", example=1),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_pt", type="string", example="1"),
     *                      @OA\Property(property="nama_pt", type="string", example="Universitas Lampung"),
     *                      @OA\Property(property="is_fakultas", type="string", example="1"),
     *                      @OA\Property(property="is_jurusan", type="string", example="1"),
     *                      @OA\Property(property="id_yayasan", type="integer", example=1),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into ms_pt () values () returning id"),
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
     *     path="/v1/pt/{id}",
     *     summary="Update pt",
     *     tags={"Pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id pt",
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
     *                 @OA\Property(property="kode_pt", type="string", example="1"),
     *                 @OA\Property(property="nama_pt", type="string", example="Universitas Lampung"),
     *                 @OA\Property(property="is_fakultas", type="string", example="1"),
     *                 @OA\Property(property="is_jurusan", type="string", example="1"),
     *                 @OA\Property(property="id_yayasan", type="integer", example=1),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_pt", type="string", example="1"),
     *                      @OA\Property(property="nama_pt", type="string", example="Universitas Lampung"),
     *                      @OA\Property(property="is_fakultas", type="string", example="1"),
     *                      @OA\Property(property="is_jurusan", type="string", example="1"),
     *                      @OA\Property(property="id_yayasan", type="integer", example=1),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update ms_pt set ms_pt.id = 1 where ms_pt.id = 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\Pt] 1"),
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
     *     path="/v1/pt/{id}",
     *     summary="Delete pt",
     *     tags={"Pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id pt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Pt"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\Pt] 1"),
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
     *         schema="Pt",
     *         @OA\Xml(name="Pt"),
     * required={"kode_pt", "nama_pt", "is_fakultas", "is_jurusan"},
     *         @OA\Property(property="id", type="integer", example=1),
     *         @OA\Property(property="kode_pt", type="string", example="1"),
     *         @OA\Property(property="nama_pt", type="string", example="Universitas Lampung"),
     *         @OA\Property(property="is_fakultas", type="string", example="1"),
     *         @OA\Property(property="is_jurusan", type="string", example="1"),
     *         @OA\Property(property="id_yayasan", type="integer", example=1),
     *     ),
     */
}
