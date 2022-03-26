<?php

namespace App\Schemas;

use Siakad\Schema;

class TahunAjaranSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_pt' => ['type' => 'integer', 'required' => true],
		'tahun_ajaran' => ['type' => 'string', 'length' => 4, 'required' => true],
		'nama_tahun_ajaran' => ['type' => 'string', 'length' => 50, 'required' => true],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
