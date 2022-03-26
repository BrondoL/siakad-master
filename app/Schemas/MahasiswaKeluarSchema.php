<?php

namespace App\Schemas;

use Siakad\Schema;

class MahasiswaKeluarSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_mahasiswa_pt' => ['type' => 'integer', 'required' => true],
		'id_periode' => ['type' => 'integer', 'required' => true],
		'id_status' => ['type' => 'integer', 'required' => true],
		'tgl_sk' => ['type' => 'date'],
		'no_sk' => ['type' => 'string', 'length' => 100],
		'id_file_sk' => ['type' => 'guid'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
