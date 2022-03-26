<?php

namespace App\Schemas;

use Siakad\Schema;

class JenjangPendidikanPtSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_pt' => ['type' => 'integer', 'required' => true],
		'id_jenjang' => ['type' => 'integer', 'required' => true],
		'max_cuti' => ['type' => 'integer'],
		'max_studi' => ['type' => 'integer'],
		'masa_studi' => ['type' => 'integer'],
		'default_nilai' => ['type' => 'decimal', 'length' => 3, 'decimal' => 2],
		'kode_nim' => ['type' => 'string', 'length' => 3],
		'kode_emis' => ['type' => 'string', 'length' => 2],
		'kode_emis_pasca' => ['type' => 'string', 'length' => 2],
		'deskripsi' => ['type' => 'string', 'length' => 500],
		'is_pt' => ['type' => 'string', 'length' => 1, 'required' => true],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
