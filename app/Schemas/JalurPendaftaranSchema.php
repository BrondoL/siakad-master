<?php

namespace App\Schemas;

use Siakad\Schema;

class JalurPendaftaranSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'nama_jalur' => ['type' => 'string', 'length' => 100, 'required' => true],
		'keterangan' => ['type' => 'string', 'length' => 1000],
		'kode_transfer' => ['type' => 'string', 'length' => 2, 'required' => true],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
