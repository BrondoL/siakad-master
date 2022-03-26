<?php

namespace App\Schemas;

use Siakad\Schema;

class JenjangPendidikanSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_jenjang' => ['type' => 'string', 'length' => 5, 'required' => true],
		'nama_jenjang' => ['type' => 'string', 'length' => 100, 'required' => true],
		'nama_jenjang_en' => ['type' => 'string', 'length' => 100],
		'is_akademik' => ['type' => 'string', 'length' => 1, 'required' => true],
		'is_univ' => ['type' => 'string', 'length' => 1, 'required' => true],
		'urutan' => ['type' => 'integer'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
