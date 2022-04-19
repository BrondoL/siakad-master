<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class JabatanStrukturalTest extends TestCase
{
    private $jabatanstrukturalSchema = ["id", "kode_struktural", "nama_struktural", "nama_singkat", "id_parent", "id_pangkat_min", "id_pangkat_max", "kode_eselon", "keterangan", "is_pimpinan", "info_left", "info_right"];
    private $payload = [
        'kode_struktural' => 'xxx',
        'nama_struktural' => 'zzz',
        'nama_singkat' => 'zzz',
        'id_parent' => 20,
        'id_pangkat_min' => 5,
        'id_pangkat_max' => 5,
        'kode_eselon' => 'waw',
        'keterangan' => 'hallo',
        'is_pimpinan' => '1',
        'info_left' => 1,
        'info_right' => 1,
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ms_jabatan_struktural ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_jabatanstruktural()
    {
        $response = $this->json("POST", "v1/jabatan-struktural", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->jabatanstrukturalSchema,
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

    public function test_get_jabatanstruktural()
    {
        $response = $this->json("GET", "v1/jabatan-struktural", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->jabatanstrukturalSchema
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

    public function test_get_jabatanstruktural_with_id()
    {
        $response = $this->json("GET", "v1/jabatan-struktural/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jabatanstrukturalSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_jabatanstruktural_with_wrong_id()
    {
        $response = $this->json("GET", "v1/jabatan-struktural/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_jabatanstruktural()
    {
        $response = $this->json("GET", "v1/jabatan-struktural/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_jabatanstruktural()
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

    public function test_get_list_jabatanstruktural()
    {
        $response = $this->json("GET", "v1/jabatan-struktural", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->jabatanstrukturalSchema
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

    public function test_get_detail_jabatanstruktural()
    {
        $response = $this->json("GET", "v1/jabatan-struktural/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jabatanstrukturalSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_jabatanstruktural()
    {
        $response = $this->json("PUT", "v1/jabatan-struktural/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jabatanstrukturalSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_jabatanstruktural()
    {
        $response = $this->json("DELETE", "v1/jabatan-struktural/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_jabatanstruktural()
    {
        $response = $this->json("POST", "v1/jabatan-struktural", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
