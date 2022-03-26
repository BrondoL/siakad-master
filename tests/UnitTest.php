<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class UnitTest extends TestCase
{
    private $unitSchema = ["id", "id_pt", "nama_unit", "nama_unit_en", "nama_singkat", "id_parent", "id_jenjang", "jenis_unit", "alamat", "telepon", "email", "website", "gelar", "gelar_en", "deskripsi_gelar", "deskripsi_gelar_en", "akreditasi", "sk_akreditasi", "tgl_akreditasi", "tgl_sk_pendirian", "id_periode_berdiri", "sks_lulus_min", "ipk_lulus_min", "batas_sks_awal", "jumlah_pembimbing", "jumlah_penguji", "id_jenis_ta", "kode_nim", "foto", "keterangan", "visi", "misi", "kompetensi", "cp", "is_aktif", "is_eksternal", "info_left", "info_right", "id_ketua", "id_sekretaris", "id_pembantu_1", "id_pembantu_2", "id_pembantu_3", "id_pembantu_4"];
    private $payload = [
        'nama_unit' => 'ilmu komputer',
        'nama_unit_en' => 'computer science',
        'nama_singkat' => 'ilkom',
        'id_parent' => 1,
        'id_jenjang' => 1,
        'jenis_unit' => 's',
        'alamat' => 'Jl. Raya Cibaduyut',
        'telepon' => '0821-1234567',
        'email' => 'unila@unila.ac.id',
        'website' => 'unila.ac.id',
        'gelar' => 'S. Kom',
        'gelar_en' => 'S. Kom',
        'deskripsi_gelar' => 'Sarjana Computer',
        'deskripsi_gelar_en' => 'Bachelor of Computer Science',
        'akreditasi' => 'A',
        'sk_akreditasi' => 'www.test.com',
        'tgl_akreditasi' => '2021-01-01',
        'tgl_sk_pendirian' => '2024-01-01',
        'id_periode_berdiri' => 8,
        'sks_lulus_min' => 144,
        'ipk_lulus_min' => '2.75',
        'batas_sks_awal' => 24,
        'jumlah_pembimbing' => 2,
        'jumlah_penguji' => 2,
        'id_jenis_ta' => '1',
        'kode_nim' => '510',
        'foto' => 'www.test.com',
        'keterangan' => 'tidak ada',
        'visi' => 'ilkom keren',
        'misi' => 'menang lomba',
        'kompetensi' => 'tidak ada',
        'cp' => 'tidak ada',
        'is_aktif' => '1',
        'is_eksternal' => '1',
        'id_ketua' => 2,
        'id_sekretaris' => 2,
        'id_pembantu_1' => 2,
        'id_pembantu_2' => 2,
        'id_pembantu_3' => 2,
        'id_pembantu_4' => 2,
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ms_unit ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_unit()
    {
        $response = $this->json("POST", "v1/unit", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->unitSchema,
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

    public function test_get_unit()
    {
        $response = $this->json("GET", "v1/unit", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->unitSchema
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

    public function test_get_unit_with_id()
    {
        $response = $this->json("GET", "v1/unit/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->unitSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_unit_with_wrong_id()
    {
        $response = $this->json("GET", "v1/unit/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_unit()
    {
        $response = $this->json("GET", "v1/unit/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_unit()
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

    public function test_get_list_unit()
    {
        $response = $this->json("GET", "v1/unit", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->unitSchema
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

    public function test_get_detail_unit()
    {
        $response = $this->json("GET", "v1/unit/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->unitSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_unit()
    {
        $response = $this->json("PUT", "v1/unit/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->unitSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_unit()
    {
        $response = $this->json("DELETE", "v1/unit/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_unit()
    {
        $response = $this->json("POST", "v1/unit", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
