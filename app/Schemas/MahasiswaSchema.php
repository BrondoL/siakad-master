<?php

namespace App\Schemas;

use Siakad\Schema;

class MahasiswaSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'nama' => ['type' => 'string', 'length' => 200, 'required' => true],
		'gelar_depan' => ['type' => 'string', 'length' => 30],
		'gelar_belakang' => ['type' => 'string', 'length' => 30],
		'jenis_kelamin' => ['type' => 'string', 'length' => 1, 'required' => true],
		'tempat_lahir' => ['type' => 'string', 'length' => 100, 'required' => true],
		'tgl_lahir' => ['type' => 'date', 'required' => true],
		'alamat' => ['type' => 'string', 'length' => 255],
		'telepon' => ['type' => 'string', 'length' => 20],
		'hp' => ['type' => 'string', 'length' => 20],
		'hp_2' => ['type' => 'string', 'length' => 20],
		'email' => ['type' => 'string', 'length' => 100],
		'gol_darah' => ['type' => 'string', 'length' => 2],
		'status_nikah' => ['type' => 'string', 'length' => 1],
		'nik' => ['type' => 'string', 'length' => 30],
		'no_kk' => ['type' => 'string', 'length' => 30],
		'rt' => ['type' => 'string', 'length' => 5],
		'rw' => ['type' => 'string', 'length' => 5],
		'dusun' => ['type' => 'string', 'length' => 100],
		'desa' => ['type' => 'string', 'length' => 100],
		'no_kps' => ['type' => 'string', 'length' => 20],
		'id_agama' => ['type' => 'integer'],
		'id_negara' => ['type' => 'integer'],
		'id_kota' => ['type' => 'integer'],
		'id_kecamatan' => ['type' => 'integer'],
		'id_suku' => ['type' => 'integer'],
		'id_pekerjaan' => ['type' => 'integer'],
		'id_penghasilan' => ['type' => 'integer'],
		'id_tinggal' => ['type' => 'integer'],
		'id_transport' => ['type' => 'integer'],
		'id_hobi' => ['type' => 'integer'],
		'id_minat' => ['type' => 'integer'],
		'no_rekening' => ['type' => 'string', 'length' => 50],
		'berat_badan' => ['type' => 'decimal', 'length' => 5, 'decimal' => 2],
		'tinggi_badan' => ['type' => 'decimal', 'length' => 5, 'decimal' => 2],
		'instansi_kerja' => ['type' => 'string', 'length' => 100],
		'email_ortu' => ['type' => 'string', 'length' => 100],
		'show_hp' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'show_kota' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'show_hobi' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'show_minat' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'is_valid_email' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'id_file_akta_kelahiran' => ['type' => 'guid'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
