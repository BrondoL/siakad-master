<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class PegawaiPtController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/pegawai-pt",
     *      tags={"Pegawai pt"},
     *      summary="List Pegawai pt",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of pegawai pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="id_pegawai", type="integer", example=""),
     *                      @OA\Property(property="nip", type="string", example=""),
     *                      @OA\Property(property="nidn", type="string", example=""),
     *                      @OA\Property(property="nupn", type="string", example=""),
     *                      @OA\Property(property="nidk", type="string", example=""),
     *                      @OA\Property(property="email_kampus", type="string", example=""),
     *                      @OA\Property(property="id_unit", type="integer", example=""),
     *                      @OA\Property(property="id_jenjang", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat", type="integer", example=""),
     *                      @OA\Property(property="id_fungsional", type="integer", example=""),
     *                      @OA\Property(property="id_struktural", type="integer", example=""),
     *                      @OA\Property(property="id_jenis", type="integer", example=""),
     *                      @OA\Property(property="id_status", type="integer", example=""),
     *                      @OA\Property(property="id_bidang", type="integer", example=""),
     *                      @OA\Property(property="tugas_luar", type="string", example=""),
     *                      @OA\Property(property="is_dosen_luar", type="string", example=""),
     *                      @OA\Property(property="is_pengasuh", type="string", example=""),
     *                      @OA\Property(property="is_pembina_ukm", type="string", example=""),
     *                      @OA\Property(property="is_pembina_ekskul", type="string", example=""),
     *                      @OA\Property(property="kuota_pa", type="integer", example=""),
     *                      @OA\Property(property="kuota_pembimbing", type="integer", example=""),
     *                      @OA\Property(property="is_valid_email", type="string", example=""),
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
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from ak_pegawai_pt"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/pegawai-pt/{id}",
     *     summary="Data Pegawai pt",
     *     tags={"Pegawai pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id pegawai pt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of pegawai pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="id_pegawai", type="integer", example=""),
     *                      @OA\Property(property="nip", type="string", example=""),
     *                      @OA\Property(property="nidn", type="string", example=""),
     *                      @OA\Property(property="nupn", type="string", example=""),
     *                      @OA\Property(property="nidk", type="string", example=""),
     *                      @OA\Property(property="email_kampus", type="string", example=""),
     *                      @OA\Property(property="id_unit", type="integer", example=""),
     *                      @OA\Property(property="id_jenjang", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat", type="integer", example=""),
     *                      @OA\Property(property="id_fungsional", type="integer", example=""),
     *                      @OA\Property(property="id_struktural", type="integer", example=""),
     *                      @OA\Property(property="id_jenis", type="integer", example=""),
     *                      @OA\Property(property="id_status", type="integer", example=""),
     *                      @OA\Property(property="id_bidang", type="integer", example=""),
     *                      @OA\Property(property="tugas_luar", type="string", example=""),
     *                      @OA\Property(property="is_dosen_luar", type="string", example=""),
     *                      @OA\Property(property="is_pengasuh", type="string", example=""),
     *                      @OA\Property(property="is_pembina_ukm", type="string", example=""),
     *                      @OA\Property(property="is_pembina_ekskul", type="string", example=""),
     *                      @OA\Property(property="kuota_pa", type="integer", example=""),
     *                      @OA\Property(property="kuota_pembimbing", type="integer", example=""),
     *                      @OA\Property(property="is_valid_email", type="string", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM ak_pegawai_pt WHERE ak_pegawai_pt.id = 1 limit 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\PegawaiPt] 1"),
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
     *     path="/v1/pegawai-pt",
     *     summary="Add Pegawai pt",
     *     tags={"Pegawai pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="id_pegawai", type="integer", example=""),
     *                 @OA\Property(property="nip", type="string", example=""),
     *                 @OA\Property(property="nidn", type="string", example=""),
     *                 @OA\Property(property="nupn", type="string", example=""),
     *                 @OA\Property(property="nidk", type="string", example=""),
     *                 @OA\Property(property="email_kampus", type="string", example=""),
     *                 @OA\Property(property="id_unit", type="integer", example=""),
     *                 @OA\Property(property="id_jenjang", type="integer", example=""),
     *                 @OA\Property(property="id_pangkat", type="integer", example=""),
     *                 @OA\Property(property="id_fungsional", type="integer", example=""),
     *                 @OA\Property(property="id_struktural", type="integer", example=""),
     *                 @OA\Property(property="id_jenis", type="integer", example=""),
     *                 @OA\Property(property="id_status", type="integer", example=""),
     *                 @OA\Property(property="id_bidang", type="integer", example=""),
     *                 @OA\Property(property="tugas_luar", type="string", example=""),
     *                 @OA\Property(property="is_dosen_luar", type="string", example=""),
     *                 @OA\Property(property="is_pengasuh", type="string", example=""),
     *                 @OA\Property(property="is_pembina_ukm", type="string", example=""),
     *                 @OA\Property(property="is_pembina_ekskul", type="string", example=""),
     *                 @OA\Property(property="kuota_pa", type="integer", example=""),
     *                 @OA\Property(property="kuota_pembimbing", type="integer", example=""),
     *                 @OA\Property(property="is_valid_email", type="string", example=""),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new pegawai pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="id_pegawai", type="integer", example=""),
     *                      @OA\Property(property="nip", type="string", example=""),
     *                      @OA\Property(property="nidn", type="string", example=""),
     *                      @OA\Property(property="nupn", type="string", example=""),
     *                      @OA\Property(property="nidk", type="string", example=""),
     *                      @OA\Property(property="email_kampus", type="string", example=""),
     *                      @OA\Property(property="id_unit", type="integer", example=""),
     *                      @OA\Property(property="id_jenjang", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat", type="integer", example=""),
     *                      @OA\Property(property="id_fungsional", type="integer", example=""),
     *                      @OA\Property(property="id_struktural", type="integer", example=""),
     *                      @OA\Property(property="id_jenis", type="integer", example=""),
     *                      @OA\Property(property="id_status", type="integer", example=""),
     *                      @OA\Property(property="id_bidang", type="integer", example=""),
     *                      @OA\Property(property="tugas_luar", type="string", example=""),
     *                      @OA\Property(property="is_dosen_luar", type="string", example=""),
     *                      @OA\Property(property="is_pengasuh", type="string", example=""),
     *                      @OA\Property(property="is_pembina_ukm", type="string", example=""),
     *                      @OA\Property(property="is_pembina_ekskul", type="string", example=""),
     *                      @OA\Property(property="kuota_pa", type="integer", example=""),
     *                      @OA\Property(property="kuota_pembimbing", type="integer", example=""),
     *                      @OA\Property(property="is_valid_email", type="string", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into ak_pegawai_pt () values () returning id"),
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
     *     path="/v1/pegawai-pt/{id}",
     *     summary="Update pegawai pt",
     *     tags={"Pegawai pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id pegawai pt",
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
     *                 @OA\Property(property="id_pegawai", type="integer", example=""),
     *                 @OA\Property(property="nip", type="string", example=""),
     *                 @OA\Property(property="nidn", type="string", example=""),
     *                 @OA\Property(property="nupn", type="string", example=""),
     *                 @OA\Property(property="nidk", type="string", example=""),
     *                 @OA\Property(property="email_kampus", type="string", example=""),
     *                 @OA\Property(property="id_unit", type="integer", example=""),
     *                 @OA\Property(property="id_jenjang", type="integer", example=""),
     *                 @OA\Property(property="id_pangkat", type="integer", example=""),
     *                 @OA\Property(property="id_fungsional", type="integer", example=""),
     *                 @OA\Property(property="id_struktural", type="integer", example=""),
     *                 @OA\Property(property="id_jenis", type="integer", example=""),
     *                 @OA\Property(property="id_status", type="integer", example=""),
     *                 @OA\Property(property="id_bidang", type="integer", example=""),
     *                 @OA\Property(property="tugas_luar", type="string", example=""),
     *                 @OA\Property(property="is_dosen_luar", type="string", example=""),
     *                 @OA\Property(property="is_pengasuh", type="string", example=""),
     *                 @OA\Property(property="is_pembina_ukm", type="string", example=""),
     *                 @OA\Property(property="is_pembina_ekskul", type="string", example=""),
     *                 @OA\Property(property="kuota_pa", type="integer", example=""),
     *                 @OA\Property(property="kuota_pembimbing", type="integer", example=""),
     *                 @OA\Property(property="is_valid_email", type="string", example=""),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Pegawai pt.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer", example=""),
     *                      @OA\Property(property="id_pegawai", type="integer", example=""),
     *                      @OA\Property(property="nip", type="string", example=""),
     *                      @OA\Property(property="nidn", type="string", example=""),
     *                      @OA\Property(property="nupn", type="string", example=""),
     *                      @OA\Property(property="nidk", type="string", example=""),
     *                      @OA\Property(property="email_kampus", type="string", example=""),
     *                      @OA\Property(property="id_unit", type="integer", example=""),
     *                      @OA\Property(property="id_jenjang", type="integer", example=""),
     *                      @OA\Property(property="id_pangkat", type="integer", example=""),
     *                      @OA\Property(property="id_fungsional", type="integer", example=""),
     *                      @OA\Property(property="id_struktural", type="integer", example=""),
     *                      @OA\Property(property="id_jenis", type="integer", example=""),
     *                      @OA\Property(property="id_status", type="integer", example=""),
     *                      @OA\Property(property="id_bidang", type="integer", example=""),
     *                      @OA\Property(property="tugas_luar", type="string", example=""),
     *                      @OA\Property(property="is_dosen_luar", type="string", example=""),
     *                      @OA\Property(property="is_pengasuh", type="string", example=""),
     *                      @OA\Property(property="is_pembina_ukm", type="string", example=""),
     *                      @OA\Property(property="is_pembina_ekskul", type="string", example=""),
     *                      @OA\Property(property="kuota_pa", type="integer", example=""),
     *                      @OA\Property(property="kuota_pembimbing", type="integer", example=""),
     *                      @OA\Property(property="is_valid_email", type="string", example=""),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update ak_pegawai_pt set ak_pegawai_pt.id = 1 where ak_pegawai_pt.id = 1"),
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
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\PegawaiPt] 1"),
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
     *     path="/v1/pegawai-pt/{id}",
     *     summary="Delete pegawai pt",
     *     tags={"Pegawai pt"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id pegawai pt",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus Pegawai pt"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\Models\PegawaiPt] 1"),
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
     *         schema="Pegawai pt",
     *         @OA\Xml(name="Pegawai pt"),
     *         @OA\Property(property="id", type="integer", example=""),
     *         @OA\Property(property="id_pegawai", type="integer", example=""),
     *         @OA\Property(property="nip", type="string", example=""),
     *         @OA\Property(property="nidn", type="string", example=""),
     *         @OA\Property(property="nupn", type="string", example=""),
     *         @OA\Property(property="nidk", type="string", example=""),
     *         @OA\Property(property="email_kampus", type="string", example=""),
     *         @OA\Property(property="id_unit", type="integer", example=""),
     *         @OA\Property(property="id_jenjang", type="integer", example=""),
     *         @OA\Property(property="id_pangkat", type="integer", example=""),
     *         @OA\Property(property="id_fungsional", type="integer", example=""),
     *         @OA\Property(property="id_struktural", type="integer", example=""),
     *         @OA\Property(property="id_jenis", type="integer", example=""),
     *         @OA\Property(property="id_status", type="integer", example=""),
     *         @OA\Property(property="id_bidang", type="integer", example=""),
     *         @OA\Property(property="tugas_luar", type="string", example=""),
     *         @OA\Property(property="is_dosen_luar", type="string", example=""),
     *         @OA\Property(property="is_pengasuh", type="string", example=""),
     *         @OA\Property(property="is_pembina_ukm", type="string", example=""),
     *         @OA\Property(property="is_pembina_ekskul", type="string", example=""),
     *         @OA\Property(property="kuota_pa", type="integer", example=""),
     *         @OA\Property(property="kuota_pembimbing", type="integer", example=""),
     *         @OA\Property(property="is_valid_email", type="string", example=""),
     *     ),
     */
}
        