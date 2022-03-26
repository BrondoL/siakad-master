<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class JabatanStrukturalController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/jabatan-struktural",
     *      tags={"Jabatan struktural"},
     *      summary="List Jabatan struktural",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of jabatan struktural.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="kode_struktural", type="string", example=""),
     *                      @OA\Property(property="nama_struktural", type="string", example=""),
     *                      @OA\Property(property="nama_singkat", type="string", example=""),
     *                      @OA\Property(property="id_parent", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat_min", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat_max", type="integer", example=""),
     *                      @OA\Property(property="kode_eselon", type="string", example=""),
     *                      @OA\Property(property="keterangan", type="string", example=""),
     *                      @OA\Property(property="is_pimpinan", type="string", example=""),
     *                      @OA\Property(property="info_left", type="integer", example=""),
     *                      @OA\Property(property="info_right", type="integer", example=""),
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
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from ms_jabatan_struktural"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/jabatan-struktural/{id}",
     *     summary="Data Jabatan struktural",
     *     tags={"Jabatan struktural"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id jabatan struktural",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of jabatan struktural.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="kode_struktural", type="string", example=""),
     *                      @OA\Property(property="nama_struktural", type="string", example=""),
     *                      @OA\Property(property="nama_singkat", type="string", example=""),
     *                      @OA\Property(property="id_parent", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat_min", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat_max", type="integer", example=""),
     *                      @OA\Property(property="kode_eselon", type="string", example=""),
     *                      @OA\Property(property="keterangan", type="string", example=""),
     *                      @OA\Property(property="is_pimpinan", type="string", example=""),
     *                      @OA\Property(property="info_left", type="integer", example=""),
     *                      @OA\Property(property="info_right", type="integer", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM ms_jabatan_struktural WHERE ms_jabatan_struktural.id = 1 limit 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\JabatanStruktural] 1"),
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
     *     path="/v1/jabatan-struktural",
     *     summary="Add Jabatan struktural",
     *     tags={"Jabatan struktural"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="kode_struktural", type="string", example=""),
     *                 @OA\Property(property="nama_struktural", type="string", example=""),
     *                 @OA\Property(property="nama_singkat", type="string", example=""),
     *                 @OA\Property(property="id_parent", type="integer", example=""),
     *                 @OA\Property(property="id_pangkat_min", type="integer", example=""),
     *                 @OA\Property(property="id_pangkat_max", type="integer", example=""),
     *                 @OA\Property(property="kode_eselon", type="string", example=""),
     *                 @OA\Property(property="keterangan", type="string", example=""),
     *                 @OA\Property(property="is_pimpinan", type="string", example=""),
     *                 @OA\Property(property="info_left", type="integer", example=""),
     *                 @OA\Property(property="info_right", type="integer", example=""),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new jabatan struktural.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="kode_struktural", type="string", example=""),
     *                      @OA\Property(property="nama_struktural", type="string", example=""),
     *                      @OA\Property(property="nama_singkat", type="string", example=""),
     *                      @OA\Property(property="id_parent", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat_min", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat_max", type="integer", example=""),
     *                      @OA\Property(property="kode_eselon", type="string", example=""),
     *                      @OA\Property(property="keterangan", type="string", example=""),
     *                      @OA\Property(property="is_pimpinan", type="string", example=""),
     *                      @OA\Property(property="info_left", type="integer", example=""),
     *                      @OA\Property(property="info_right", type="integer", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into ms_jabatan_struktural () values () returning id"),
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
     *     path="/v1/jabatan-struktural/{id}",
     *     summary="Update jabatan struktural",
     *     tags={"Jabatan struktural"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id jabatan struktural",
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
     *                 @OA\Property(property="kode_struktural", type="string", example=""),
     *                 @OA\Property(property="nama_struktural", type="string", example=""),
     *                 @OA\Property(property="nama_singkat", type="string", example=""),
     *                 @OA\Property(property="id_parent", type="integer", example=""),
     *                 @OA\Property(property="id_pangkat_min", type="integer", example=""),
     *                 @OA\Property(property="id_pangkat_max", type="integer", example=""),
     *                 @OA\Property(property="kode_eselon", type="string", example=""),
     *                 @OA\Property(property="keterangan", type="string", example=""),
     *                 @OA\Property(property="is_pimpinan", type="string", example=""),
     *                 @OA\Property(property="info_left", type="integer", example=""),
     *                 @OA\Property(property="info_right", type="integer", example=""),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Jabatan struktural.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="kode_struktural", type="string", example=""),
     *                      @OA\Property(property="nama_struktural", type="string", example=""),
     *                      @OA\Property(property="nama_singkat", type="string", example=""),
     *                      @OA\Property(property="id_parent", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat_min", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat_max", type="integer", example=""),
     *                      @OA\Property(property="kode_eselon", type="string", example=""),
     *                      @OA\Property(property="keterangan", type="string", example=""),
     *                      @OA\Property(property="is_pimpinan", type="string", example=""),
     *                      @OA\Property(property="info_left", type="integer", example=""),
     *                      @OA\Property(property="info_right", type="integer", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update ms_jabatan_struktural set ms_jabatan_struktural.id = 1 where ms_jabatan_struktural.id = 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\JabatanStruktural] 1"),
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
     *     path="/v1/jabatan-struktural/{id}",
     *     summary="Delete jabatan struktural",
     *     tags={"Jabatan struktural"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id jabatan struktural",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Jabatan struktural"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\JabatanStruktural] 1"),
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
     *         schema="Jabatan struktural",
     *         @OA\Xml(name="Jabatan struktural"),
     *         @OA\Property(property="id", type="integer", example=""),
     *         @OA\Property(property="kode_struktural", type="string", example=""),
     *         @OA\Property(property="nama_struktural", type="string", example=""),
     *         @OA\Property(property="nama_singkat", type="string", example=""),
     *         @OA\Property(property="id_parent", type="integer", example=""),
     *         @OA\Property(property="id_pangkat_min", type="integer", example=""),
     *         @OA\Property(property="id_pangkat_max", type="integer", example=""),
     *         @OA\Property(property="kode_eselon", type="string", example=""),
     *         @OA\Property(property="keterangan", type="string", example=""),
     *         @OA\Property(property="is_pimpinan", type="string", example=""),
     *         @OA\Property(property="info_left", type="integer", example=""),
     *         @OA\Property(property="info_right", type="integer", example=""),
     *     ),
     */
}
        