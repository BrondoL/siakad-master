<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class MahasiswaPtTest extends TestCase
{
    private $mahasiswaptSchema = ["id", "id_mahasiswa", "nim", "id_periode", "id_unit", "id_tahun", "id_jalur", "id_gelombang", "id_sistem", "id_kelas", "id_bidang", "id_periode_akhir", "email_kampus", "tgl_daftar", "nilai_tpa", "nilai_kesehatan", "nilai_psikotes", "nilai_wawancara", "jenis_transfer", "kode_transfer", "kode_pendidikan_asal", "asal_smu", "alamat_smu", "telepon_smu", "jurusan_smu", "thn_lulus_smu", "nem_smu", "no_ijasah_smu", "nisn", "nupn", "id_kota_smu", "id_propinsi_smu", "tgl_transfer", "nim_lama", "asal_pt", "prodi_pt", "nim_pt", "ipk_asal", "sks_asal", "npsn", "id_periode_transfer", "id_unit_asal", "id_tahun_asal", "id_universitas", "id_universitas_prodi", "nirm", "nirl", "id_almamater", "is_valid_email"];
    private $payload = [
        'id_mahasiswa' => 1,
        'nim' => '1817051074',
        'id_periode' => 8,
        'id_unit' => 4,
        'id_tahun' => 8,
        'id_jalur' => 1,
        'id_gelombang' => 3,
        'id_sistem' => 2,
        'id_kelas' => 2,
        'id_bidang' => 2,
        'id_periode_akhir' => 8,
        'email_kampus' => 'nabil@students.unila.ac.id',
        'tgl_daftar' => '2018-07-10',
        'nilai_tpa' => '8.65',
        'nilai_kesehatan' => '2.32',
        'nilai_psikotes' => '2.54',
        'nilai_wawancara' => '2.11',
        'jenis_transfer' => 'a',
        'kode_transfer' => 'a',
        'kode_pendidikan_asal' => 'a',
        'asal_smu' => 'sma kebangsaan',
        'alamat_smu' => 'Jl. Jalan',
        'telepon_smu' => '08222222222',
        'jurusan_smu' => 'IPA',
        'thn_lulus_smu' => 2018,
        'nem_smu' => '8.00',
        'no_ijasah_smu' => '1234567890',
        'nisn' => '12',
        'nupn' => '12',
        'id_kota_smu' => 2,
        'id_propinsi_smu' => 2,
        'tgl_transfer' => '2021-05-10',
        'nim_lama' => '1817051074',
        'asal_pt' => 'unila',
        'prodi_pt' => 'ilkom',
        'nim_pt' => '1817051074',
        'ipk_asal' => '6.00',
        'sks_asal' => 124,
        'npsn' => '12',
        'id_periode_transfer' => 8,
        'id_unit_asal' => 4,
        'id_tahun_asal' => 8,
        'id_universitas' => 2,
        'id_universitas_prodi' => 6,
        'nirm' => '12',
        'nirl' => '12',
        'id_almamater' => 1,
        'is_valid_email' => '1',
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.ak_mahasiswa_pt ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_mahasiswapt()
    {
        $response = $this->json("POST", "v1/mahasiswa-pt", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->mahasiswaptSchema,
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

    public function test_get_mahasiswapt()
    {
        $response = $this->json("GET", "v1/mahasiswa-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->mahasiswaptSchema
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

    public function test_get_mahasiswapt_with_id()
    {
        $response = $this->json("GET", "v1/mahasiswa-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->mahasiswaptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_mahasiswapt_with_wrong_id()
    {
        $response = $this->json("GET", "v1/mahasiswa-pt/-1", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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

    public function test_detail_mahasiswapt()
    {
        $response = $this->json("GET", "v1/mahasiswa-pt/1/detail", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_mahasiswapt()
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

    public function test_get_list_mahasiswapt()
    {
        $response = $this->json("GET", "v1/mahasiswa-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->mahasiswaptSchema
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

    public function test_get_detail_mahasiswapt()
    {
        $response = $this->json("GET", "v1/mahasiswa-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->mahasiswaptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_mahasiswapt()
    {
        $response = $this->json("PUT", "v1/mahasiswa-pt/" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->mahasiswaptSchema,
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_mahasiswapt()
    {
        $response = $this->json("DELETE", "v1/mahasiswa-pt/" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_mahasiswapt()
    {
        $response = $this->json("POST", "v1/mahasiswa-pt", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
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
