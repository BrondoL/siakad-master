<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class JalurPendaftaranController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/jalur-pendaftaran",
     *      tags={"Jalur pendaftaran"},
     *      summary="List Jalur pendaftaran",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of jalur pendaftaran.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="nama_jalur", type="string", example="Mandiri"),
     *                      @OA\Property(property="keterangan", type="string", example="Kelas Mandiri"),
     *                      @OA\Property(property="kode_transfer", type="string", example="10074"),
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
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from lv_jalur_pendaftaran"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/jalur-pendaftaran/{id}",
     *     summary="Data Jalur pendaftaran",
     *     tags={"Jalur pendaftaran"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id jalur pendaftaran",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of jalur pendaftaran.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="nama_jalur", type="string", example="Mandiri"),
     *                      @OA\Property(property="keterangan", type="string", example="Kelas Mandiri"),
     *                      @OA\Property(property="kode_transfer", type="string", example="10074"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM lv_jalur_pendaftaran WHERE lv_jalur_pendaftaran.id = 1 limit 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\JalurPendaftaran] 1"),
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
     *     path="/v1/jalur-pendaftaran",
     *     summary="Add Jalur pendaftaran",
     *     tags={"Jalur pendaftaran"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     * required={"nama_jalur", "kode_transfer"},
     *                 @OA\Property(property="nama_jalur", type="string", example="Mandiri"),
     *                 @OA\Property(property="keterangan", type="string", example="Kelas Mandiri"),
     *                 @OA\Property(property="kode_transfer", type="string", example="74"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new jalur pendaftaran.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="nama_jalur", type="string", example="Mandiri"),
     *                      @OA\Property(property="keterangan", type="string", example="Kelas Mandiri"),
     *                      @OA\Property(property="kode_transfer", type="string", example="10074"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into lv_jalur_pendaftaran () values () returning id"),
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
     *     path="/v1/jalur-pendaftaran/{id}",
     *     summary="Update jalur pendaftaran",
     *     tags={"Jalur pendaftaran"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id jalur pendaftaran",
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
     *                 @OA\Property(property="nama_jalur", type="string", example="Mandiri"),
     *                 @OA\Property(property="keterangan", type="string", example="Kelas Mandiri"),
     *                 @OA\Property(property="kode_transfer", type="string", example="74"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Jalur pendaftaran.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="nama_jalur", type="string", example="Mandiri"),
     *                      @OA\Property(property="keterangan", type="string", example="Kelas Mandiri"),
     *                      @OA\Property(property="kode_transfer", type="string", example="10074"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update lv_jalur_pendaftaran set lv_jalur_pendaftaran.id = 1 where lv_jalur_pendaftaran.id = 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\JalurPendaftaran] 1"),
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
     *     path="/v1/jalur-pendaftaran/{id}",
     *     summary="Delete jalur pendaftaran",
     *     tags={"Jalur pendaftaran"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id jalur pendaftaran",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Jalur pendaftaran"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\JalurPendaftaran] 1"),
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
     *         schema="Jalur pendaftaran",
     *         @OA\Xml(name="Jalur pendaftaran"),
     * required={"nama_jalur", "kode_transfer"},
     *         @OA\Property(property="id", type="integer", example=1),
     *         @OA\Property(property="nama_jalur", type="string", example="Mandiri"),
     *         @OA\Property(property="keterangan", type="string", example="Kelas Mandiri"),
     *         @OA\Property(property="kode_transfer", type="string", example="74"),
     *     ),
     */
}
