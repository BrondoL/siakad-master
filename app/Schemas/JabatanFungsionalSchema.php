<?php

namespace App\Schemas;

use Siakad\Schema;

class JabatanFungsionalSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_fungsional' => ['type' => 'string', 'length' => 5, 'required' => true],
		'nama_fungsional' => ['type' => 'string', 'length' => 100, 'required' => true],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
