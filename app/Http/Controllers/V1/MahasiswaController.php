<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class MahasiswaController extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/mahasiswa",
     *      tags={"Mahasiswa"},
     *      summary="List Mahasiswa",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of mahasiswa.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="nama", type="string"),
     *                      @OA\Property(property="gelar_depan", type="string"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string"),
     *                      @OA\Property(property="time", type="integer"),
     *                  ),
     *              ),
     *          ),
     *       ),
     *       @OA\Response(response=401, description="Anda tidak memiliki akses ke sistem"),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/mahasiswa/{id}",
     *     summary="Data Mahasiswa",
     *     tags={"Mahasiswa"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id mahasiswa",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of mahasiswa.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="nama", type="string"),
     *                      @OA\Property(property="gelar_depan", type="string"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string"),
     *                      @OA\Property(property="time", type="integer"),
     *                  ),
     *              ),
     *          ),
     *       ),
     *     @OA\Response(response=401, description="Anda tidak memiliki akses ke sistem"),
     * )
     */

    /**
     * @OA\Post(
     *     path="/v1/mahasiswa",
     *     summary="Add Mahasiswa",
     *     tags={"Mahasiswa"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="nama",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="jenis_kelamin",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="tempat_lahir",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="tgl_lahir",
     *                     type="string"
     *                 ),
     *                 example={"nama": "Aulia Ahmad Nabil", "jenis_kelamin": "L", "tempat_lahir": "Bandar Lampung", "tgl_lahir": "2000-05-10"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new mahasiswa.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="nama", type="string"),
     *                      @OA\Property(property="gelar_depan", type="string"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string"),
     *                      @OA\Property(property="time", type="integer"),
     *                  ),
     *              ),
     *          ),
     *       ),
     *     @OA\Response(response=401, description="Anda tidak memiliki akses ke sistem"),
     * )
     */

    /**
     * @OA\Put(
     *     path="/v1/mahasiswa/{id}",
     *     summary="Update mahasiswa",
     *     tags={"Mahasiswa"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id mahasiswa",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="nama",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="jenis_kelamin",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="tempat_lahir",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="tgl_lahir",
     *                     type="string"
     *                 ),
     *                 example={"nama": "Aulia Ahmad Nabil", "jenis_kelamin": "L", "tempat_lahir": "Bandar Lampung", "tgl_lahir": "2000-05-10"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update Mahasiswa.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="nama", type="string"),
     *                      @OA\Property(property="gelar_depan", type="string"),
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string"),
     *                      @OA\Property(property="time", type="integer"),
     *                  ),
     *              ),
     *          ),
     *       ),
     *     @OA\Response(response=401, description="Error: Unauthorized",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=401),
     *                      @OA\Property(property="message", type="string", example="Anda tidak memiliki akses ke sistem"),
     *              ),
     *          ),
     *     ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select * from ak_mahasiswa where ak_mahasiswa.id = '1' limit 1"),
     *                      @OA\Property(property="time", type="integer", example=2.25),
     *                  ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     * @OA\Delete(
     *     path="/v1/mahasiswa/{id}",
     *     summary="Delete mahasiswa",
     *     tags={"Mahasiswa"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id mahasiswa",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description=""
     *       ),
     *     @OA\Response(response=401, description="Error: Unauthorized",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=401),
     *                      @OA\Property(property="message", type="string", example="Anda tidak memiliki akses ke sistem"),
     *              ),
     *          ),
     *     ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select * from ak_mahasiswa where ak_mahasiswa.id = '1' limit 1"),
     *                      @OA\Property(property="time", type="integer", example=2.25),
     *                  ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     *     @OA\Schema(
     *         schema="Mahasiswa",
     *         @OA\Xml(name="Mahasiswa"),
     *         @OA\Property(property="id", example=2, type="string"),
     *         @OA\Property(property="nama", example="Aulia Ahmad Nabil", type="string"),
     *         @OA\Property(property="gelar_depan", example=null, type="string"),
     *         @OA\Property(property="gelar_belakang", example=null, type="string"),
     *         @OA\Property(property="jenis_kelamin", example="L", type="string"),
     *         @OA\Property(property="tempat_lahir", example="Bandar Lampung", type="string"),
     *         @OA\Property(property="tgl_lahir", example="2000-05-10", type="string"),
     *         @OA\Property(property="alamat", example=null, type="string"),
     *         @OA\Property(property="telepon", example=null, type="string"),
     *         @OA\Property(property="hp", example=null, type="string"),
     *         @OA\Property(property="hp_2", example=null, type="string"),
     *         @OA\Property(property="email", example=null, type="string"),
     *         @OA\Property(property="gol_darah", example=null, type="string"),
     *         @OA\Property(property="status_nikah", example=null, type="string"),
     *         @OA\Property(property="nik", example=null, type="string"),
     *         @OA\Property(property="no_kk", example=null, type="string"),
     *         @OA\Property(property="rt", example=null, type="string"),
     *         @OA\Property(property="rw", example=null, type="string"),
     *         @OA\Property(property="dusun", example=null, type="string"),
     *         @OA\Property(property="desa", example=null, type="string"),
     *         @OA\Property(property="no_kps", example=null, type="string"),
     *         @OA\Property(property="id_agama", example=null, type="string"),
     *         @OA\Property(property="id_negara", example=null, type="string"),
     *         @OA\Property(property="id_kota", example=null, type="string"),
     *         @OA\Property(property="id_kecamatan", example=null, type="string"),
     *         @OA\Property(property="id_suku", example=null, type="string"),
     *         @OA\Property(property="id_pekerjaan", example=null, type="string"),
     *         @OA\Property(property="id_penghasilan", example=null, type="string"),
     *         @OA\Property(property="id_tinggal", example=null, type="string"),
     *         @OA\Property(property="id_transport", example=null, type="string"),
     *         @OA\Property(property="id_hobi", example=null, type="string"),
     *         @OA\Property(property="id_minat", example=null, type="string"),
     *         @OA\Property(property="no_rekening", example=null, type="string"),
     *         @OA\Property(property="berat_badan", example=null, type="string"),
     *         @OA\Property(property="tinggi_badan", example=null, type="string"),
     *         @OA\Property(property="instansi_kerja", example=null, type="string"),
     *         @OA\Property(property="email_ortu", example=null, type="string"),
     *         @OA\Property(property="show_hp", example="0", type="string"),
     *         @OA\Property(property="show_kota", example="0", type="string"),
     *         @OA\Property(property="show_hobi", example="0", type="string"),
     *         @OA\Property(property="show_minat", example="0", type="string"),
     *         @OA\Property(property="is_valid_email", example="0", type="string"),
     *     ),
     */
}
