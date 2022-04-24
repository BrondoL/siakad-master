<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class MahasiswaKeluarController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/mahasiswa-keluar",
     *      tags={"Mahasiswa keluar"},
     *      summary="List Mahasiswa keluar",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of mahasiswa keluar.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_mahasiswa_pt", type="integer", example=1),
     *                      @OA\Property(property="id_periode", type="integer", example=1),
     *                      @OA\Property(property="id_status", type="integer", example=1),
     *                      @OA\Property(property="tgl_sk", type="date", example="2020-01-01"),
     *                      @OA\Property(property="no_sk", type="string", example="UIDA-SK-A-01/UNILA/2020"),
     *                      @OA\Property(property="id_file_sk", type="guid", example="d6516396-c03c-41d7-b9ee-98761dbae0b5"),
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
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from ak_mahasiswa_keluar"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/mahasiswa-keluar/{id}",
     *     summary="Data Mahasiswa keluar",
     *     tags={"Mahasiswa keluar"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id mahasiswa keluar",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of mahasiswa keluar.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_mahasiswa_pt", type="integer", example=1),
     *                      @OA\Property(property="id_periode", type="integer", example=1),
     *                      @OA\Property(property="id_status", type="integer", example=1),
     *                      @OA\Property(property="tgl_sk", type="date", example="2020-01-01"),
     *                      @OA\Property(property="no_sk", type="string", example="UIDA-SK-A-01/UNILA/2020"),
     *                      @OA\Property(property="id_file_sk", type="guid", example="d6516396-c03c-41d7-b9ee-98761dbae0b5"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM ak_mahasiswa_keluar WHERE ak_mahasiswa_keluar.id = 1 limit 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\MahasiswaKeluar] 1"),
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
     *     path="/v1/mahasiswa-keluar",
     *     summary="Add Mahasiswa keluar",
     *     tags={"Mahasiswa keluar"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     * required={"id_mahasiswa_pt", "id_periode", "id_status"},
     *                 @OA\Property(property="id_mahasiswa_pt", type="integer", example=1),
     *                 @OA\Property(property="id_periode", type="integer", example=1),
     *                 @OA\Property(property="id_status", type="integer", example=1),
     *                 @OA\Property(property="tgl_sk", type="date", example="2020-01-01"),
     *                 @OA\Property(property="no_sk", type="string", example="UIDA-SK-A-01/UNILA/2020"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new mahasiswa keluar.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_mahasiswa_pt", type="integer", example=1),
     *                      @OA\Property(property="id_periode", type="integer", example=1),
     *                      @OA\Property(property="id_status", type="integer", example=1),
     *                      @OA\Property(property="tgl_sk", type="date", example="2020-01-01"),
     *                      @OA\Property(property="no_sk", type="string", example="UIDA-SK-A-01/UNILA/2020"),
     *                      @OA\Property(property="id_file_sk", type="guid", example="d6516396-c03c-41d7-b9ee-98761dbae0b5"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into ak_mahasiswa_keluar () values () returning id"),
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
     *     path="/v1/mahasiswa-keluar/{id}",
     *     summary="Update mahasiswa keluar",
     *     tags={"Mahasiswa keluar"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id mahasiswa keluar",
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
     *                 @OA\Property(property="id_mahasiswa_pt", type="integer", example=1),
     *                 @OA\Property(property="id_periode", type="integer", example=1),
     *                 @OA\Property(property="id_status", type="integer", example=1),
     *                 @OA\Property(property="tgl_sk", type="date", example="2020-01-01"),
     *                 @OA\Property(property="no_sk", type="string", example="UIDA-SK-A-01/UNILA/2020"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Mahasiswa keluar.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="id_mahasiswa_pt", type="integer", example=1),
     *                      @OA\Property(property="id_periode", type="integer", example=1),
     *                      @OA\Property(property="id_status", type="integer", example=1),
     *                      @OA\Property(property="tgl_sk", type="date", example="2020-01-01"),
     *                      @OA\Property(property="no_sk", type="string", example="UIDA-SK-A-01/UNILA/2020"),
     *                      @OA\Property(property="id_file_sk", type="guid", example="d6516396-c03c-41d7-b9ee-98761dbae0b5"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update ak_mahasiswa_keluar set ak_mahasiswa_keluar.id = 1 where ak_mahasiswa_keluar.id = 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\MahasiswaKeluar] 1"),
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
     *     path="/v1/mahasiswa-keluar/{id}",
     *     summary="Delete mahasiswa keluar",
     *     tags={"Mahasiswa keluar"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id mahasiswa keluar",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Mahasiswa keluar"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\MahasiswaKeluar] 1"),
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
     *         schema="Mahasiswa keluar",
     *         @OA\Xml(name="Mahasiswa keluar"),
     *         @OA\Property(property="id", type="integer", example=1),
     *         @OA\Property(property="id_mahasiswa_pt", type="integer", example=1),
     *         @OA\Property(property="id_periode", type="integer", example=1),
     *         @OA\Property(property="id_status", type="integer", example=1),
     *         @OA\Property(property="tgl_sk", type="date", example="2020-01-01"),
     *         @OA\Property(property="no_sk", type="string", example="UIDA-SK-A-01/UNILA/2020"),
     *         @OA\Property(property="id_file_sk", type="guid", example="d6516396-c03c-41d7-b9ee-98761dbae0b5"),
     *     ),
     */
}
