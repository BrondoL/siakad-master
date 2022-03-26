<?php

namespace App\Schemas;

use Siakad\Schema;

class BidangStudiSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_unit' => ['type' => 'integer', 'required' => true],
		'kode_bidang' => ['type' => 'string', 'length' => 5, 'required' => true],
		'nama_bidang' => ['type' => 'string', 'length' => 100, 'required' => true],
		'nama_bidang_en' => ['type' => 'string', 'length' => 100],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
