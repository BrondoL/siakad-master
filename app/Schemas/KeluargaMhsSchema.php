<?php

namespace App\Schemas;

use Siakad\Schema;

class KeluargaMhsSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_mahasiswa' => ['type' => 'integer', 'required' => true],
		'status_keluarga' => ['type' => 'string', 'length' => 1, 'required' => true],
		'nama' => ['type' => 'string', 'length' => 200, 'required' => true],
		'tgl_lahir' => ['type' => 'date'],
		'alamat' => ['type' => 'string', 'length' => 255],
		'telepon' => ['type' => 'string', 'length' => 20],
		'email' => ['type' => 'string', 'length' => 100],
		'nik' => ['type' => 'string', 'length' => 100],
		'is_nik_aktif' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'id_jenjang' => ['type' => 'integer'],
		'id_pekerjaan' => ['type' => 'integer'],
		'id_penghasilan' => ['type' => 'integer'],
		'instansi_kerja' => ['type' => 'string', 'length' => 30],
		'status_kondisi' => ['type' => 'string', 'length' => 1],
		'status_kerabat' => ['type' => 'string', 'length' => 1],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
