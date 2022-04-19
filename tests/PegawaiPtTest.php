<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class PegawaiPtTest extends TestCase
{
    private $pegawaiptSchema = ["id", "id_pegawai", "nip", "nidn", "nupn", "nidk", "email_kampus", "id_unit", "id_jenjang", "id_pangkat", "id_fungsional", "id_struktural", "id_jenis", "id_status", "id_bidang", "tugas_luar", "is_dosen_luar", "is_pengasuh", "is_pembina_ukm", "is_pembina_ekskul", "kuota_pa", "kuota_pembimbing", "is_valid_email"];
    private $payload = [
        'id_pegawai' => 1,
        'nip' => '1817',
        'nidn' => '1817',
        'nupn' => '1817',
        'nidk' => '1817',
        'email_kampus' => 'ahmad@students.unila.ac.id',
        'id_unit' => 4,
        'id_jenjang' => 1,
        'id_pangkat' => 5,
        'id_fungsional' => 2,
        'id_struktural' => 20,
        'id_jenis' => 2,
        'id_status' => 2,
        'id_bidang' => 2,
        'tugas_luar' => '1',
        'is_dosen_luar' => '1',
        'is_pengasuh' => '1',
        'is_pembina_ukm' => '1',
        'is_pembina_ekskul' => '1',
        'kuota_pa' => 2,
        'kuota_pembimbing' => 2,
        'is_valid_email' => '1',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ak_pegawai_pt ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_pegawaipt()
    {
        $response = $this->json("POST", "v1/pegawai-pt", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->pegawaiptSchema,
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

    public function test_get_pegawaipt()
    {
        $response = $this->json("GET", "v1/pegawai-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->pegawaiptSchema
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

    public function test_get_pegawaipt_with_id()
    {
        $response = $this->json("GET", "v1/pegawai-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->pegawaiptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_pegawaipt_with_wrong_id()
    {
        $response = $this->json("GET", "v1/pegawai-pt/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_pegawaipt()
    {
        $response = $this->json("GET", "v1/pegawai-pt/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_pegawaipt()
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

    public function test_get_list_pegawaipt()
    {
        $response = $this->json("GET", "v1/pegawai-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->pegawaiptSchema
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

    public function test_get_detail_pegawaipt()
    {
        $response = $this->json("GET", "v1/pegawai-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->pegawaiptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_pegawaipt()
    {
        $response = $this->json("PUT", "v1/pegawai-pt/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->pegawaiptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_pegawaipt()
    {
        $response = $this->json("DELETE", "v1/pegawai-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_pegawaipt()
    {
        $response = $this->json("POST", "v1/pegawai-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
