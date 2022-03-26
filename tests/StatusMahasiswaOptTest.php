<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class StatusMahasiswaOptTest extends TestCase
{
    private $statusmahasiswaoptSchema = ["id", "id_pt", "id_status", "kode_emis", "is_diajukan"];
    private $payload = [
        'id_status' => 1,
        'kode_emis' => 'az',
        'is_diajukan' => '1',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.lv_status_mahasiswa_opt ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_statusmahasiswaopt()
    {
        $response = $this->json("POST", "v1/status-mahasiswa-opt", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->statusmahasiswaoptSchema,
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

    public function test_get_statusmahasiswaopt()
    {
        $response = $this->json("GET", "v1/status-mahasiswa-opt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->statusmahasiswaoptSchema
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

    public function test_get_statusmahasiswaopt_with_id()
    {
        $response = $this->json("GET", "v1/status-mahasiswa-opt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->statusmahasiswaoptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_statusmahasiswaopt_with_wrong_id()
    {
        $response = $this->json("GET", "v1/status-mahasiswa-opt/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_statusmahasiswaopt()
    {
        $response = $this->json("GET", "v1/status-mahasiswa-opt/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_statusmahasiswaopt()
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

    public function test_get_list_statusmahasiswaopt()
    {
        $response = $this->json("GET", "v1/status-mahasiswa-opt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->statusmahasiswaoptSchema
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

    public function test_get_detail_statusmahasiswaopt()
    {
        $response = $this->json("GET", "v1/status-mahasiswa-opt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->statusmahasiswaoptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_statusmahasiswaopt()
    {
        $response = $this->json("PUT", "v1/status-mahasiswa-opt/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->statusmahasiswaoptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_statusmahasiswaopt()
    {
        $response = $this->json("DELETE", "v1/status-mahasiswa-opt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_statusmahasiswaopt()
    {
        $response = $this->json("POST", "v1/status-mahasiswa-opt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
