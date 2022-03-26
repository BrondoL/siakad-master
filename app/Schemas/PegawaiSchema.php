<?php

namespace App\Schemas;

use Siakad\Schema;

class PegawaiSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'nama' => ['type' => 'string', 'length' => 100, 'required' => true],
		'gelar_depan' => ['type' => 'string', 'length' => 30],
		'gelar_belakang' => ['type' => 'string', 'length' => 100],
		'jenis_kelamin' => ['type' => 'string', 'length' => 1, 'required' => true],
		'tgl_lahir' => ['type' => 'date'],
		'tempat_lahir' => ['type' => 'string', 'length' => 100],
		'alamat' => ['type' => 'string', 'length' => 100],
		'telepon' => ['type' => 'string', 'length' => 20],
		'email' => ['type' => 'string', 'length' => 100],
		'id_agama' => ['type' => 'integer'],
		'id_universitas' => ['type' => 'integer'],
		'id_kota' => ['type' => 'integer'],
		'id_hobi' => ['type' => 'integer'],
		'id_minat' => ['type' => 'integer'],
		'show_hp' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'show_email' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'show_kota' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'show_hobi' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'show_minat' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'is_valid_email' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'id_file_ttd' => ['type' => 'guid'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
