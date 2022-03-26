<?php

namespace App\Schemas;

use Siakad\Schema;

class UniversitasProdiSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_universitas' => ['type' => 'integer', 'required' => true],
		'kode_prodi' => ['type' => 'string', 'length' => 10, 'required' => true],
		'nama_prodi' => ['type' => 'string', 'length' => 100, 'required' => true],
		'id_jenjang' => ['type' => 'integer'],
		'alamat' => ['type' => 'string', 'length' => 100],
		'telepon' => ['type' => 'string', 'length' => 20],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
