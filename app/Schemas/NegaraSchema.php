<?php

namespace App\Schemas;

use Siakad\Schema;

class NegaraSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_negara' => ['type' => 'string', 'length' => 5, 'required' => true],
		'nama_kota' => ['type' => 'string', 'length' => 100, 'required' => true],
		'kode_emis' => ['type' => 'string', 'length' => 2],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
