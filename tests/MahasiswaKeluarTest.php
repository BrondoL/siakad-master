<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class MahasiswaKeluarTest extends TestCase
{
    private $mahasiswakeluarSchema = ["id", "id_mahasiswa_pt", "id_periode", "id_status", "tgl_sk", "no_sk"];
    private $payload = [
        'id_mahasiswa_pt' => 3,
        'id_periode' => 8,
        'id_status' => 1,
        'tgl_sk' => '2022-05-10',
        'no_sk' => '12',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ak_mahasiswa_keluar ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_mahasiswakeluar()
    {
        $response = $this->json("POST", "v1/mahasiswa-keluar", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->mahasiswakeluarSchema,
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

    public function test_get_mahasiswakeluar()
    {
        $response = $this->json("GET", "v1/mahasiswa-keluar", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->mahasiswakeluarSchema
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

    public function test_get_mahasiswakeluar_with_id()
    {
        $response = $this->json("GET", "v1/mahasiswa-keluar/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->mahasiswakeluarSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_mahasiswakeluar_with_wrong_id()
    {
        $response = $this->json("GET", "v1/mahasiswa-keluar/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_mahasiswakeluar()
    {
        $response = $this->json("GET", "v1/mahasiswa-keluar/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_mahasiswakeluar()
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

    public function test_get_list_mahasiswakeluar()
    {
        $response = $this->json("GET", "v1/mahasiswa-keluar", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->mahasiswakeluarSchema
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

    public function test_get_detail_mahasiswakeluar()
    {
        $response = $this->json("GET", "v1/mahasiswa-keluar/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->mahasiswakeluarSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_mahasiswakeluar()
    {
        $response = $this->json("PUT", "v1/mahasiswa-keluar/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->mahasiswakeluarSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_mahasiswakeluar()
    {
        $response = $this->json("DELETE", "v1/mahasiswa-keluar/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_mahasiswakeluar()
    {
        $response = $this->json("POST", "v1/mahasiswa-keluar", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
