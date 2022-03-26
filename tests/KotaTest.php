<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class KotaTest extends TestCase
{
    private $kotaSchema = ["id", "kode_kota", "nama_kota", "id_parent", "level", "kode_iso", "kode_dikti"];
    private $payload = [
        'kode_kota' => 'JKT',
        'nama_kota' => 'Jakarta',
        'id_parent' => 1,
        'level' => '1',
        'kode_iso' => 'jkt',
        'kode_dikti' => 'jkt',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.lv_kota ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_kota()
    {
        $response = $this->json("POST", "v1/kota", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->kotaSchema,
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

    public function test_get_kota()
    {
        $response = $this->json("GET", "v1/kota", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->kotaSchema
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

    public function test_get_kota_with_id()
    {
        $response = $this->json("GET", "v1/kota/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->kotaSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_kota_with_wrong_id()
    {
        $response = $this->json("GET", "v1/kota/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_kota()
    {
        $response = $this->json("GET", "v1/kota/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_kota()
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

    public function test_get_list_kota()
    {
        $response = $this->json("GET", "v1/kota", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->kotaSchema
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

    public function test_get_detail_kota()
    {
        $response = $this->json("GET", "v1/kota/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->kotaSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_kota()
    {
        $response = $this->json("PUT", "v1/kota/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->kotaSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_kota()
    {
        $response = $this->json("DELETE", "v1/kota/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_kota()
    {
        $response = $this->json("POST", "v1/kota", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
