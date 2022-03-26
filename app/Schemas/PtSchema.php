<?php

namespace App\Schemas;

use Siakad\Schema;

class PtSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_pt' => ['type' => 'string', 'length' => 20, 'required' => true],
		'nama_pt' => ['type' => 'string', 'length' => 100, 'required' => true],
		'is_fakultas' => ['type' => 'string', 'length' => 1, 'required' => true],
		'is_jurusan' => ['type' => 'string', 'length' => 1, 'required' => true],
		'id_yayasan' => ['type' => 'integer'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
