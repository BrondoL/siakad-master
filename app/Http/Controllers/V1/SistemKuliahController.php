<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class SistemKuliahController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/sistem-kuliah",
     *      tags={"Sistem kuliah"},
     *      summary="List Sistem kuliah",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of sistem kuliah.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_sistem", type="integer", example=1),
     *                      @OA\Property(property="nama_sistem", type="string", example="Reguler A"),
     *                      @OA\Property(property="keterangan", type="string", example="Kelas Pagi (senin - jumat)"),
     *                      @OA\Property(property="is_reguler", type="string", example="1"),
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
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from lv_sistem_kuliah"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/sistem-kuliah/{id}",
     *     summary="Data Sistem kuliah",
     *     tags={"Sistem kuliah"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id sistem kuliah",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of sistem kuliah.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_sistem", type="integer", example=1),
     *                      @OA\Property(property="nama_sistem", type="string", example="Reguler A"),
     *                      @OA\Property(property="keterangan", type="string", example="Kelas Pagi (senin - jumat)"),
     *                      @OA\Property(property="is_reguler", type="string", example="1"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM lv_sistem_kuliah WHERE lv_sistem_kuliah.id = 1 limit 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\SistemKuliah] 1"),
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
     *     path="/v1/sistem-kuliah",
     *     summary="Add Sistem kuliah",
     *     tags={"Sistem kuliah"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="kode_sistem", type="integer", example=1),
     *                 @OA\Property(property="nama_sistem", type="string", example="Reguler A"),
     *                 @OA\Property(property="keterangan", type="string", example="Kelas Pagi (senin - jumat)"),
     *                 @OA\Property(property="is_reguler", type="string", example="1"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new sistem kuliah.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_sistem", type="integer", example=1),
     *                      @OA\Property(property="nama_sistem", type="string", example="Reguler A"),
     *                      @OA\Property(property="keterangan", type="string", example="Kelas Pagi (senin - jumat)"),
     *                      @OA\Property(property="is_reguler", type="string", example="1"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into lv_sistem_kuliah () values () returning id"),
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
     *     path="/v1/sistem-kuliah/{id}",
     *     summary="Update sistem kuliah",
     *     tags={"Sistem kuliah"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id sistem kuliah",
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
     *                 @OA\Property(property="kode_sistem", type="integer", example=1),
     *                 @OA\Property(property="nama_sistem", type="string", example="Reguler A"),
     *                 @OA\Property(property="keterangan", type="string", example="Kelas Pagi (senin - jumat)"),
     *                 @OA\Property(property="is_reguler", type="string", example="1"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Sistem kuliah.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="kode_sistem", type="integer", example=1),
     *                      @OA\Property(property="nama_sistem", type="string", example="Reguler A"),
     *                      @OA\Property(property="keterangan", type="string", example="Kelas Pagi (senin - jumat)"),
     *                      @OA\Property(property="is_reguler", type="string", example="1"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update lv_sistem_kuliah set lv_sistem_kuliah.id = 1 where lv_sistem_kuliah.id = 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\SistemKuliah] 1"),
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
     *     path="/v1/sistem-kuliah/{id}",
     *     summary="Delete sistem kuliah",
     *     tags={"Sistem kuliah"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id sistem kuliah",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Sistem kuliah"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\SistemKuliah] 1"),
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
     *         schema="Sistem kuliah",
     *         @OA\Xml(name="Sistem kuliah"),
     *         @OA\Property(property="id", type="integer", example=1),
     *         @OA\Property(property="kode_sistem", type="integer", example=1),
     *         @OA\Property(property="nama_sistem", type="string", example="Reguler A"),
     *         @OA\Property(property="keterangan", type="string", example="Kelas Pagi (senin - jumat)"),
     *         @OA\Property(property="is_reguler", type="string", example="1"),
     *     ),
     */
}
