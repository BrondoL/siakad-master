<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class JenjangPendidikanTest extends TestCase
{
    private $jenjangpendidikanSchema = ["id", "kode_jenjang", "nama_jenjang", "nama_jenjang_en", "is_akademik", "is_univ", "urutan"];
    private $payload = [
        'kode_jenjang' => 'S3',
        'nama_jenjang' => 'S3',
        'nama_jenjang_en' => 'Master Degree',
        'is_akademik' => '1',
        'is_univ' => '1',
        'urutan' => 1,
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.lv_jenjang_pendidikan ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_jenjangpendidikan()
    {
        $response = $this->json("POST", "v1/jenjang-pendidikan", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->jenjangpendidikanSchema,
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

    public function test_get_jenjangpendidikan()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->jenjangpendidikanSchema
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

    public function test_get_jenjangpendidikan_with_id()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jenjangpendidikanSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_jenjangpendidikan_with_wrong_id()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_jenjangpendidikan()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_jenjangpendidikan()
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

    public function test_get_list_jenjangpendidikan()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->jenjangpendidikanSchema
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

    public function test_get_detail_jenjangpendidikan()
    {
        $response = $this->json("GET", "v1/jenjang-pendidikan/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jenjangpendidikanSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_jenjangpendidikan()
    {
        $response = $this->json("PUT", "v1/jenjang-pendidikan/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jenjangpendidikanSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_jenjangpendidikan()
    {
        $response = $this->json("DELETE", "v1/jenjang-pendidikan/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_jenjangpendidikan()
    {
        $response = $this->json("POST", "v1/jenjang-pendidikan", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
