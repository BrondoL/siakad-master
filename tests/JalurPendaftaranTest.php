<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class JalurPendaftaranTest extends TestCase
{
    private $jalurpendaftaranSchema = ["id", "nama_jalur", "keterangan", "kode_transfer"];
    private $payload = [
        'nama_jalur' => 'SBMPTN',
        'keterangan' => 'ini jalur pake test bukan nyogok',
        'kode_transfer' => '20',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.lv_jalur_pendaftaran ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_jalurpendaftaran()
    {
        $response = $this->json("POST", "v1/jalur-pendaftaran", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->jalurpendaftaranSchema,
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

    public function test_get_jalurpendaftaran()
    {
        $response = $this->json("GET", "v1/jalur-pendaftaran", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->jalurpendaftaranSchema
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

    public function test_get_jalurpendaftaran_with_id()
    {
        $response = $this->json("GET", "v1/jalur-pendaftaran/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jalurpendaftaranSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_jalurpendaftaran_with_wrong_id()
    {
        $response = $this->json("GET", "v1/jalur-pendaftaran/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_jalurpendaftaran()
    {
        $response = $this->json("GET", "v1/jalur-pendaftaran/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_jalurpendaftaran()
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

    public function test_get_list_jalurpendaftaran()
    {
        $response = $this->json("GET", "v1/jalur-pendaftaran", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->jalurpendaftaranSchema
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

    public function test_get_detail_jalurpendaftaran()
    {
        $response = $this->json("GET", "v1/jalur-pendaftaran/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jalurpendaftaranSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_jalurpendaftaran()
    {
        $response = $this->json("PUT", "v1/jalur-pendaftaran/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->jalurpendaftaranSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_jalurpendaftaran()
    {
        $response = $this->json("DELETE", "v1/jalur-pendaftaran/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_jalurpendaftaran()
    {
        $response = $this->json("POST", "v1/jalur-pendaftaran", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
