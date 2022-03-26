<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class BidangIlmuPtTest extends TestCase
{
    private $bidangilmuptSchema = ["id","id_pt","id_bidang"];
    private $payload = [
        'id_bidang' => 2,
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.lv_bidang_ilmu_pt ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_bidangilmupt()
    {
        $response = $this->json("POST", "v1/bidang-ilmu-pt", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->bidangilmuptSchema,
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

    public function test_get_bidangilmupt()
    {
        $response = $this->json("GET", "v1/bidang-ilmu-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->bidangilmuptSchema
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

    public function test_get_bidangilmupt_with_id()
    {
        $response = $this->json("GET", "v1/bidang-ilmu-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->bidangilmuptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_bidangilmupt_with_wrong_id()
    {
        $response = $this->json("GET", "v1/bidang-ilmu-pt/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_bidangilmupt()
    {
        $response = $this->json("GET", "v1/bidang-ilmu-pt/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_bidangilmupt()
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

    public function test_get_list_bidangilmupt()
    {
        $response = $this->json("GET", "v1/bidang-ilmu-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->bidangilmuptSchema
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

    public function test_get_detail_bidangilmupt()
    {
        $response = $this->json("GET", "v1/bidang-ilmu-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->bidangilmuptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_bidangilmupt()
    {
        $response = $this->json("PUT", "v1/bidang-ilmu-pt/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->bidangilmuptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_bidangilmupt()
    {
        $response = $this->json("DELETE", "v1/bidang-ilmu-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_bidangilmupt()
    {
        $response = $this->json("POST", "v1/bidang-ilmu-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
