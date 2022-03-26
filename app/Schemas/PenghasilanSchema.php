<?php

namespace App\Schemas;

use Siakad\Schema;

class PenghasilanSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_penghasilan' => ['type' => 'integer', 'required' => true],
		'nama_penghasilan' => ['type' => 'string', 'length' => 100, 'required' => true],
		'poin_bidik_misi' => ['type' => 'integer', 'required' => true, 'default' => '0'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
