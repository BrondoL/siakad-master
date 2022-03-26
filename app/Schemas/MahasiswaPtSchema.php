<?php

namespace App\Schemas;

use Siakad\Schema;

class MahasiswaPtSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_mahasiswa' => ['type' => 'integer', 'required' => true],
		'nim' => ['type' => 'string', 'length' => 24, 'required' => true],
		'id_periode' => ['type' => 'integer', 'required' => true],
		'id_unit' => ['type' => 'integer', 'required' => true],
		'id_tahun' => ['type' => 'integer', 'required' => true],
		'id_jalur' => ['type' => 'integer'],
		'id_gelombang' => ['type' => 'integer'],
		'id_sistem' => ['type' => 'integer'],
		'id_kelas' => ['type' => 'integer'],
		'id_bidang' => ['type' => 'integer'],
		'id_periode_akhir' => ['type' => 'integer'],
		'email_kampus' => ['type' => 'string', 'length' => 100],
		'tgl_daftar' => ['type' => 'date'],
		'nilai_tpa' => ['type' => 'decimal', 'length' => 5, 'decimal' => 2],
		'nilai_kesehatan' => ['type' => 'decimal', 'length' => 5, 'decimal' => 2],
		'nilai_psikotes' => ['type' => 'decimal', 'length' => 5, 'decimal' => 2],
		'nilai_wawancara' => ['type' => 'decimal', 'length' => 5, 'decimal' => 2],
		'jenis_transfer' => ['type' => 'string', 'length' => 1],
		'kode_transfer' => ['type' => 'string', 'length' => 2],
		'kode_pendidikan_asal' => ['type' => 'string', 'length' => 5],
		'asal_smu' => ['type' => 'string', 'length' => 50],
		'alamat_smu' => ['type' => 'string', 'length' => 1000],
		'telepon_smu' => ['type' => 'string', 'length' => 15],
		'jurusan_smu' => ['type' => 'string', 'length' => 30],
		'thn_lulus_smu' => ['type' => 'integer'],
		'nem_smu' => ['type' => 'decimal', 'length' => 5, 'decimal' => 2],
		'no_ijasah_smu' => ['type' => 'string', 'length' => 50],
		'nisn' => ['type' => 'string', 'length' => 20],
		'nupn' => ['type' => 'string', 'length' => 20],
		'id_kota_smu' => ['type' => 'integer'],
		'id_propinsi_smu' => ['type' => 'integer'],
		'tgl_transfer' => ['type' => 'date'],
		'nim_lama' => ['type' => 'string', 'length' => 24],
		'asal_pt' => ['type' => 'string', 'length' => 100],
		'prodi_pt' => ['type' => 'string', 'length' => 100],
		'nim_pt' => ['type' => 'string', 'length' => 20],
		'ipk_asal' => ['type' => 'decimal', 'length' => 3, 'decimal' => 2],
		'sks_asal' => ['type' => 'integer'],
		'npsn' => ['type' => 'string', 'length' => 20],
		'id_periode_transfer' => ['type' => 'integer'],
		'id_unit_asal' => ['type' => 'integer'],
		'id_tahun_asal' => ['type' => 'integer'],
		'id_universitas' => ['type' => 'integer'],
		'id_universitas_prodi' => ['type' => 'integer'],
		'nirm' => ['type' => 'string', 'length' => 20],
		'nirl' => ['type' => 'string', 'length' => 20],
		'id_almamater' => ['type' => 'integer'],
		'is_valid_email' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'id_file_transkrip_asal' => ['type' => 'guid'],
		'id_file_ijazah_akhir' => ['type' => 'guid'],
		'id_file_surat_pindah' => ['type' => 'guid'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}