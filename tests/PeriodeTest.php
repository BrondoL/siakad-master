<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class PeriodeTest extends TestCase
{
    private $periodeSchema = ["id", "id_pt", "kode_periode", "nama_periode", "nama_singkat", "id_tahun_ajaran", "tgl_awal", "tgl_akhir", "tgl_awal_uts", "tgl_akhir_uts", "tgl_awal_uas", "tgl_akhir_uas", "bulan_awal_tagihan", "bulan_akhir_tagihan", "pertemuan_kuliah", "minimal_absensi", "is_aktif", "id_ketua_ujian"];
    private $payload = [
        'kode_periode' => '20221',
        'nama_periode' => 'test',
        'nama_singkat' => 'test',
        'id_tahun_ajaran' => 2,
        'bulan_awal_tagihan' => '5',
        'bulan_akhir_tagihan' => '12',
        'is_aktif' => '1',
        'id_ketua_ujian' => 2,
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ms_periode ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_periode()
    {
        $response = $this->json("POST", "v1/periode", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->periodeSchema,
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

    public function test_get_periode()
    {
        $response = $this->json("GET", "v1/periode", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->periodeSchema
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

    public function test_get_periode_with_id()
    {
        $response = $this->json("GET", "v1/periode/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->periodeSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_periode_with_wrong_id()
    {
        $response = $this->json("GET", "v1/periode/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_periode()
    {
        $response = $this->json("GET", "v1/periode/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_periode()
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

    public function test_get_list_periode()
    {
        $response = $this->json("GET", "v1/periode", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->periodeSchema
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

    public function test_get_detail_periode()
    {
        $response = $this->json("GET", "v1/periode/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->periodeSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_periode()
    {
        $response = $this->json("PUT", "v1/periode/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->periodeSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_periode()
    {
        $response = $this->json("DELETE", "v1/periode/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_periode()
    {
        $response = $this->json("POST", "v1/periode", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
