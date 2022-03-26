<?php

namespace App\Schemas;

use Siakad\Schema;

class JenisPegawaiSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_jenis' => ['type' => 'string', 'length' => 5, 'required' => true],
		'nama_jenis' => ['type' => 'string', 'length' => 100, 'required' => true],
		'tipe' => ['type' => 'string', 'length' => 1],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
