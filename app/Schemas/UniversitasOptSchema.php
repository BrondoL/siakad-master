<?php

namespace App\Schemas;

use Siakad\Schema;

class UniversitasOptSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_pt' => ['type' => 'integer', 'required' => true],
		'id_universitas' => ['type' => 'integer', 'required' => true],
		'is_pmb' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
