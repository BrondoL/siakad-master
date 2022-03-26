<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class PegawaiTest extends TestCase
{
    private $pegawaiSchema = ["id", "nama", "gelar_depan", "gelar_belakang", "jenis_kelamin", "tgl_lahir", "tempat_lahir", "alamat", "telepon", "email", "id_agama", "id_universitas", "id_kota", "id_hobi", "id_minat", "show_hp", "show_email", "show_kota", "show_hobi", "show_minat", "is_valid_email"];
    private $payload = [
        'nama' => 'wawik',
        'gelar_depan' => 'Drs',
        'gelar_belakang' => 'S. Kom',
        'jenis_kelamin' => 'L',
        'alamat' => 'Jl. Raya Bandar Lampung',
        'telepon' => '0822-2222-2222',
        'email' => 'idnby@gmail.com',
        'id_agama' => 1,
        'id_universitas' => 2,
        'id_kota' => 2,
        'id_hobi' => 2,
        'id_minat' => 2,
        'show_hp' => '1',
        'show_email' => '1',
        'show_kota' => '1',
        'show_hobi' => '1',
        'show_minat' => '1',
        'is_valid_email' => '1',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ak_pegawai ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_pegawai()
    {
        $response = $this->json("POST", "v1/pegawai", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->pegawaiSchema,
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

    public function test_get_pegawai()
    {
        $response = $this->json("GET", "v1/pegawai", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->pegawaiSchema
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

    public function test_get_pegawai_with_id()
    {
        $response = $this->json("GET", "v1/pegawai/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->pegawaiSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_pegawai_with_wrong_id()
    {
        $response = $this->json("GET", "v1/pegawai/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_pegawai()
    {
        $response = $this->json("GET", "v1/pegawai/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_pegawai()
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

    public function test_get_list_pegawai()
    {
        $response = $this->json("GET", "v1/pegawai", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->pegawaiSchema
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

    public function test_get_detail_pegawai()
    {
        $response = $this->json("GET", "v1/pegawai/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->pegawaiSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_pegawai()
    {
        $response = $this->json("PUT", "v1/pegawai/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->pegawaiSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_pegawai()
    {
        $response = $this->json("DELETE", "v1/pegawai/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_pegawai()
    {
        $response = $this->json("POST", "v1/pegawai", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
