<?php

namespace App\Schemas;

use Siakad\Schema;

class UniversitasSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_universitas' => ['type' => 'string', 'length' => 20, 'required' => true],
		'nama_universitas' => ['type' => 'string', 'length' => 100, 'required' => true],
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
