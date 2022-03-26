<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class JenjangPendidikanPtTest extends TestCase
{
    private $jenjangpendidikanptSchema = ["id", "id_pt", "id_jenjang", "max_cuti", "max_studi", "masa_studi", "default_nilai", "kode_nim", "kode_emis", "kode_emis_pasca", "deskripsi", "is_pt"];
    private $payload = [
        'id_jenjang' => 1,
        'max_cuti' => 3,
        'max_studi' => 16,
        'masa_studi' => 6,
        'kode_nim' => '181',
        'kode_emis' => '02',
        'kode_emis_pasca' => '03',
        'deskripsi' => 's3',
        'is_pt' => "1"
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.lv_jenjang_pendidikan_pt ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_jenjangpendidikanpt()
    {
        $response = $this->json("POST", "v1/jenjang-pendidikan-pt", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->jenjangpendidikanptSchema,
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

    public function test_get_jenjangpendidikanpt()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->jenjangpendidikanptSchema
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

    public function test_get_jenjangpendidikanpt_with_id()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jenjangpendidikanptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_jenjangpendidikanpt_with_wrong_id()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan-pt/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_jenjangpendidikanpt()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan-pt/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_jenjangpendidikanpt()
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

    public function test_get_list_jenjangpendidikanpt()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->jenjangpendidikanptSchema
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

    public function test_get_detail_jenjangpendidikanpt()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jenjangpendidikanptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_jenjangpendidikanpt()
    {
        $response = $this->json("PUT", "v1/jenjang-pendidikan-pt/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jenjangpendidikanptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_jenjangpendidikanpt()
    {
        $response = $this->json("DELETE", "v1/jenjang-pendidikan-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_jenjangpendidikanpt()
    {
        $response = $this->json("POST", "v1/jenjang-pendidikan-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
