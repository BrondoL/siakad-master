<?php

namespace App\Schemas;

use Siakad\Schema;

class SistemKuliahSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_sistem' => ['type' => 'integer', 'required' => true],
		'nama_sistem' => ['type' => 'string', 'length' => 100, 'required' => true],
		'keterangan' => ['type' => 'string', 'length' => 1000],
		'is_reguler' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
