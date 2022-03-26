<?php

namespace App\Schemas;

use Siakad\Schema;

class PekerjaanOptSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_pt' => ['type' => 'integer', 'required' => true],
		'id_pekerjaan' => ['type' => 'integer', 'required' => true],
		'kode_emis' => ['type' => 'string', 'length' => 2],
		'kode_emis_mhs' => ['type' => 'string', 'length' => 2],
		'kode_emis_lulusan' => ['type' => 'string', 'length' => 2],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
