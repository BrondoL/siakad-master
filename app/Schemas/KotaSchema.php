<?php

namespace App\Schemas;

use Siakad\Schema;

class KotaSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_kota' => ['type' => 'string', 'length' => 10, 'required' => true],
		'nama_kota' => ['type' => 'string', 'length' => 100, 'required' => true],
		'id_parent' => ['type' => 'integer'],
		'level' => ['type' => 'string', 'length' => 1, 'required' => true],
		'kode_iso' => ['type' => 'string', 'length' => 5],
		'kode_dikti' => ['type' => 'string', 'length' => 10],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
