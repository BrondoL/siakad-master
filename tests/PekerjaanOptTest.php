<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class PekerjaanOptTest extends TestCase
{
    private $pekerjaanoptSchema = ["id", "id_pt", "id_pekerjaan", "kode_emis", "kode_emis_mhs", "kode_emis_lulusan"];
    private $payload = [
        'id_pekerjaan' => 2,
        'kode_emis' => '12',
        'kode_emis_mhs' => '12',
        'kode_emis_lulusan' => '12',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.lv_pekerjaan_opt ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_pekerjaanopt()
    {
        $response = $this->json("POST", "v1/pekerjaan-opt", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->pekerjaanoptSchema,
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

    public function test_get_pekerjaanopt()
    {
        $response = $this->json("GET", "v1/pekerjaan-opt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->pekerjaanoptSchema
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

    public function test_get_pekerjaanopt_with_id()
    {
        $response = $this->json("GET", "v1/pekerjaan-opt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->pekerjaanoptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_pekerjaanopt_with_wrong_id()
    {
        $response = $this->json("GET", "v1/pekerjaan-opt/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_pekerjaanopt()
    {
        $response = $this->json("GET", "v1/pekerjaan-opt/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_pekerjaanopt()
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

    public function test_get_list_pekerjaanopt()
    {
        $response = $this->json("GET", "v1/pekerjaan-opt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->pekerjaanoptSchema
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

    public function test_get_detail_pekerjaanopt()
    {
        $response = $this->json("GET", "v1/pekerjaan-opt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->pekerjaanoptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_pekerjaanopt()
    {
        $response = $this->json("PUT", "v1/pekerjaan-opt/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->pekerjaanoptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_pekerjaanopt()
    {
        $response = $this->json("DELETE", "v1/pekerjaan-opt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_pekerjaanopt()
    {
        $response = $this->json("POST", "v1/pekerjaan-opt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
