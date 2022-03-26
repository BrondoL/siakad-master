<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class MahasiswaTest extends TestCase
{
    private $mahasiswaSchema = ["id", "nama", "gelar_depan", "gelar_belakang", "jenis_kelamin", "tempat_lahir", "tgl_lahir", "alamat", "telepon", "hp", "hp_2", "email", "gol_darah", "status_nikah", "nik", "no_kk", "rt", "rw", "dusun", "desa", "no_kps", "id_agama", "id_negara", "id_kota", "id_kecamatan", "id_suku", "id_pekerjaan", "id_penghasilan", "id_tinggal", "id_transport", "id_hobi", "id_minat", "no_rekening", "berat_badan", "tinggi_badan", "instansi_kerja", "email_ortu", "show_hp", "show_kota", "show_hobi", "show_minat", "is_valid_email"];
    private $payload = [
        'nama' => 'nabil',
        'gelar_depan' => 'H.',
        'gelar_belakang' => 'M. Kom',
        'jenis_kelamin' => 'L',
        'tempat_lahir' => 'Bandar Lampung',
        'tgl_lahir' => '2000-05-10',
        'alamat' => 'Jl. Kedoya',
        'telepon' => '08222222222',
        'hp' => '08222222222',
        'hp_2' => '08222222222',
        'email' => 'nabilunited2@gmail.com',
        'gol_darah' => 'o',
        'status_nikah' => 's',
        'nik' => '1817051074',
        'no_kk' => '1817051074',
        'rt' => '2',
        'rw' => '1',
        'dusun' => 'rambutan',
        'desa' => 'pisang',
        'no_kps' => '1',
        'id_agama' => 1,
        'id_negara' => 1,
        'id_kota' => 2,
        'id_kecamatan' => 2,
        'id_suku' => 3,
        'id_pekerjaan' => 2,
        'id_penghasilan' => 2,
        'id_tinggal' => 2,
        'id_transport' => 2,
        'id_hobi' => 2,
        'id_minat' => 2,
        'no_rekening' => '1817051074',
        'berat_badan' => '73',
        'tinggi_badan' => '173',
        'instansi_kerja' => 'unila',
        'email_ortu' => 'ortu@gmail.com',
        'show_hp' => '1',
        'show_kota' => '1',
        'show_hobi' => '1',
        'show_minat' => '1',
        'is_valid_email' => '1',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ak_mahasiswa ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_mahasiswa()
    {
        $response = $this->json("POST", "v1/mahasiswa", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->mahasiswaSchema,
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

    public function test_get_mahasiswa()
    {
        $response = $this->json("GET", "v1/mahasiswa", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->mahasiswaSchema
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

    public function test_get_mahasiswa_with_id()
    {
        $response = $this->json("GET", "v1/mahasiswa/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->mahasiswaSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_mahasiswa_with_wrong_id()
    {
        $response = $this->json("GET", "v1/mahasiswa/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_mahasiswa()
    {
        $response = $this->json("GET", "v1/mahasiswa/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_mahasiswa()
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

    public function test_get_list_mahasiswa()
    {
        $response = $this->json("GET", "v1/mahasiswa", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->mahasiswaSchema
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

    public function test_get_detail_mahasiswa()
    {
        $response = $this->json("GET", "v1/mahasiswa/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->mahasiswaSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_mahasiswa()
    {
        $response = $this->json("PUT", "v1/mahasiswa/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->mahasiswaSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_mahasiswa()
    {
        $response = $this->json("DELETE", "v1/mahasiswa/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_mahasiswa()
    {
        $response = $this->json("POST", "v1/mahasiswa", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
