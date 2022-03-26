<?php

namespace App\Schemas;

use Siakad\Schema;

class StatusPegawaiSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_status' => ['type' => 'string', 'length' => 2, 'required' => true],
		'nama_status' => ['type' => 'string', 'length' => 100, 'required' => true],
		'is_keluar' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
