<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class UniversitasOptTest extends TestCase
{
    private $universitasoptSchema = ["id", "id_pt", "id_universitas", "is_pmb"];
    private $payload = [
        'id_universitas' => 2,
        'is_pmb' => '1',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ms_universitas_opt ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_universitasopt()
    {
        $response = $this->json("POST", "v1/universitas-opt", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->universitasoptSchema,
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

    public function test_get_universitasopt()
    {
        $response = $this->json("GET", "v1/universitas-opt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->universitasoptSchema
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

    public function test_get_universitasopt_with_id()
    {
        $response = $this->json("GET", "v1/universitas-opt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->universitasoptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_universitasopt_with_wrong_id()
    {
        $response = $this->json("GET", "v1/universitas-opt/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_universitasopt()
    {
        $response = $this->json("GET", "v1/universitas-opt/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_universitasopt()
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

    public function test_get_list_universitasopt()
    {
        $response = $this->json("GET", "v1/universitas-opt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->universitasoptSchema
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

    public function test_get_detail_universitasopt()
    {
        $response = $this->json("GET", "v1/universitas-opt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->universitasoptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_universitasopt()
    {
        $response = $this->json("PUT", "v1/universitas-opt/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->universitasoptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_universitasopt()
    {
        $response = $this->json("DELETE", "v1/universitas-opt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_universitasopt()
    {
        $response = $this->json("POST", "v1/universitas-opt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
