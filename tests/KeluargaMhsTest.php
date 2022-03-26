<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class KeluargaMhsTest extends TestCase
{
    private $keluargamhsSchema = ["id", "id_mahasiswa", "status_keluarga", "nama", "tgl_lahir", "alamat", "telepon", "email", "nik", "is_nik_aktif", "id_jenjang", "id_pekerjaan", "id_penghasilan", "instansi_kerja", "status_kondisi", "status_kerabat"];
    private $payload = [
        'id_mahasiswa' => 1,
        'status_keluarga' => 's',
        'nama' => 'nabil',
        'tgl_lahir' => '2000-05-10',
        'alamat' => 'Jl. Kedoya',
        'telepon' => '08222222222',
        'email' => 'nabilunited2@gmail.com',
        'nik' => '1871051074',
        'is_nik_aktif' => '1',
        'id_jenjang' => 1,
        'id_pekerjaan' => 2,
        'id_penghasilan' => 2,
        'instansi_kerja' => 'tak tau',
        'status_kondisi' => 's',
        'status_kerabat' => 's',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ak_keluarga_mhs ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_keluargamhs()
    {
        $response = $this->json("POST", "v1/keluarga-mhs", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->keluargamhsSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    // Validasi PATH

    public function test_get_keluargamhs()
    {
        $response = $this->json("GET", "v1/keluarga-mhs", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->keluargamhsSchema
            ],
            "info" => [
                "total",
                "page",
                "last_page",
                "count",
                "start",
                "end",
            ],
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_keluargamhs_with_id()
    {
        $response = $this->json("GET", "v1/keluarga-mhs/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->keluargamhsSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_keluargamhs_with_wrong_id()
    {
        $response = $this->json("GET", "v1/keluarga-mhs/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_detail_keluargamhs()
    {
        $response = $this->json("GET", "v1/keluarga-mhs/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_keluargamhs()
    {
        $response = $this->json("GET", "v1/salah", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(500);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message",
                "debug" => [
                    "message",
                    "files"
                ]
            ],
        ]);
    }

    // Validasi Request Method

    public function test_get_list_keluargamhs()
    {
        $response = $this->json("GET", "v1/keluarga-mhs", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->keluargamhsSchema
            ],
            "info" => [
                "total",
                "page",
                "last_page",
                "count",
                "start",
                "end",
            ],
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_detail_keluargamhs()
    {
        $response = $this->json("GET", "v1/keluarga-mhs/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->keluargamhsSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_keluargamhs()
    {
        $response = $this->json("PUT", "v1/keluarga-mhs/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->keluargamhsSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_keluargamhs()
    {
        $response = $this->json("DELETE", "v1/keluarga-mhs/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_keluargamhs()
    {
        $response = $this->json("POST", "v1/keluarga-mhs", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(400);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message",
                "validation",
            ]
        ]);
    }
}
