<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class JenjangPendidikanPtController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/jenjang-pendidikan-pt",
     *      tags={"Jenjang pendidikan pt"},
     *      summary="List Jenjang pendidikan pt",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of jenjang pendidikan pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_pt", type="integer", example=1),
     *                      @OA\Property(property="id_jenjang", type="integer", example=1),
     *                      @OA\Property(property="max_cuti", type="integer", example=3),
     *                      @OA\Property(property="max_studi", type="integer", example=16),
     *                      @OA\Property(property="masa_studi", type="integer", example=3),
     *                      @OA\Property(property="default_nilai", type="decimal", example="7.65"),
     *                      @OA\Property(property="kode_nim", type="string", example="7"),
     *                      @OA\Property(property="kode_emis", type="string", example="12"),
     *                      @OA\Property(property="kode_emis_pasca", type="string", example="43"),
     *                      @OA\Property(property="deskripsi", type="string", example="S1"),
     *                      @OA\Property(property="is_pt", type="string", example="1"),
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
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from lv_jenjang_pendidikan_pt"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/jenjang-pendidikan-pt/{id}",
     *     summary="Data Jenjang pendidikan pt",
     *     tags={"Jenjang pendidikan pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id jenjang pendidikan pt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of jenjang pendidikan pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_pt", type="integer", example=1),
     *                      @OA\Property(property="id_jenjang", type="integer", example=1),
     *                      @OA\Property(property="max_cuti", type="integer", example=3),
     *                      @OA\Property(property="max_studi", type="integer", example=16),
     *                      @OA\Property(property="masa_studi", type="integer", example=3),
     *                      @OA\Property(property="default_nilai", type="decimal", example="7.65"),
     *                      @OA\Property(property="kode_nim", type="string", example="7"),
     *                      @OA\Property(property="kode_emis", type="string", example="12"),
     *                      @OA\Property(property="kode_emis_pasca", type="string", example="43"),
     *                      @OA\Property(property="deskripsi", type="string", example="S1"),
     *                      @OA\Property(property="is_pt", type="string", example="1"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM lv_jenjang_pendidikan_pt WHERE lv_jenjang_pendidikan_pt.id = 1 limit 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\JenjangPendidikanPt] 1"),
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
     *     path="/v1/jenjang-pendidikan-pt",
     *     summary="Add Jenjang pendidikan pt",
     *     tags={"Jenjang pendidikan pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     * required={"id_jenjang", "is_pt"},
     *                 @OA\Property(property="id_jenjang", type="integer", example=1),
     *                 @OA\Property(property="max_cuti", type="integer", example=3),
     *                 @OA\Property(property="max_studi", type="integer", example=16),
     *                 @OA\Property(property="masa_studi", type="integer", example=3),
     *                 @OA\Property(property="default_nilai", type="decimal", example="7.65"),
     *                 @OA\Property(property="kode_nim", type="string", example="7"),
     *                 @OA\Property(property="kode_emis", type="string", example="12"),
     *                 @OA\Property(property="kode_emis_pasca", type="string", example="43"),
     *                 @OA\Property(property="deskripsi", type="string", example="S1"),
     *                 @OA\Property(property="is_pt", type="string", example="1"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new jenjang pendidikan pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_pt", type="integer", example=1),
     *                      @OA\Property(property="id_jenjang", type="integer", example=1),
     *                      @OA\Property(property="max_cuti", type="integer", example=3),
     *                      @OA\Property(property="max_studi", type="integer", example=16),
     *                      @OA\Property(property="masa_studi", type="integer", example=3),
     *                      @OA\Property(property="default_nilai", type="decimal", example="7.65"),
     *                      @OA\Property(property="kode_nim", type="string", example="7"),
     *                      @OA\Property(property="kode_emis", type="string", example="12"),
     *                      @OA\Property(property="kode_emis_pasca", type="string", example="43"),
     *                      @OA\Property(property="deskripsi", type="string", example="S1"),
     *                      @OA\Property(property="is_pt", type="string", example="1"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into lv_jenjang_pendidikan_pt () values () returning id"),
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
     *     path="/v1/jenjang-pendidikan-pt/{id}",
     *     summary="Update jenjang pendidikan pt",
     *     tags={"Jenjang pendidikan pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id jenjang pendidikan pt",
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
     *                 @OA\Property(property="id_jenjang", type="integer", example=1),
     *                 @OA\Property(property="max_cuti", type="integer", example=3),
     *                 @OA\Property(property="max_studi", type="integer", example=16),
     *                 @OA\Property(property="masa_studi", type="integer", example=3),
     *                 @OA\Property(property="default_nilai", type="decimal", example="7.65"),
     *                 @OA\Property(property="kode_nim", type="string", example="7"),
     *                 @OA\Property(property="kode_emis", type="string", example="12"),
     *                 @OA\Property(property="kode_emis_pasca", type="string", example="43"),
     *                 @OA\Property(property="deskripsi", type="string", example="S1"),
     *                 @OA\Property(property="is_pt", type="string", example="1"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Jenjang pendidikan pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_pt", type="integer", example=1),
     *                      @OA\Property(property="id_jenjang", type="integer", example=1),
     *                      @OA\Property(property="max_cuti", type="integer", example=3),
     *                      @OA\Property(property="max_studi", type="integer", example=16),
     *                      @OA\Property(property="masa_studi", type="integer", example=3),
     *                      @OA\Property(property="default_nilai", type="decimal", example="7.65"),
     *                      @OA\Property(property="kode_nim", type="string", example="7"),
     *                      @OA\Property(property="kode_emis", type="string", example="12"),
     *                      @OA\Property(property="kode_emis_pasca", type="string", example="43"),
     *                      @OA\Property(property="deskripsi", type="string", example="S1"),
     *                      @OA\Property(property="is_pt", type="string", example="1"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update lv_jenjang_pendidikan_pt set lv_jenjang_pendidikan_pt.id = 1 where lv_jenjang_pendidikan_pt.id = 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\JenjangPendidikanPt] 1"),
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
     *     path="/v1/jenjang-pendidikan-pt/{id}",
     *     summary="Delete jenjang pendidikan pt",
     *     tags={"Jenjang pendidikan pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id jenjang pendidikan pt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Jenjang pendidikan pt"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\JenjangPendidikanPt] 1"),
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
     *         schema="Jenjang pendidikan pt",
     *         @OA\Xml(name="Jenjang pendidikan pt"),
     * required={"id_jenjang", "is_pt"},
     *         @OA\Property(property="id", type="integer", example=1),
     *         @OA\Property(property="id_pt", type="integer", example=1),
     *         @OA\Property(property="id_jenjang", type="integer", example=1),
     *         @OA\Property(property="max_cuti", type="integer", example=3),
     *         @OA\Property(property="max_studi", type="integer", example=16),
     *         @OA\Property(property="masa_studi", type="integer", example=3),
     *         @OA\Property(property="default_nilai", type="decimal", example="7.65"),
     *         @OA\Property(property="kode_nim", type="string", example="7"),
     *         @OA\Property(property="kode_emis", type="string", example="12"),
     *         @OA\Property(property="kode_emis_pasca", type="string", example="43"),
     *         @OA\Property(property="deskripsi", type="string", example="S1"),
     *         @OA\Property(property="is_pt", type="string", example="1"),
     *     ),
     */
}
