<?php

namespace App\Schemas;

use Siakad\Schema;

class JabatanStrukturalSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'kode_struktural' => ['type' => 'string', 'length' => 10, 'required' => true],
		'nama_struktural' => ['type' => 'string', 'length' => 100, 'required' => true],
		'nama_singkat' => ['type' => 'string', 'length' => 50],
		'id_parent' => ['type' => 'integer'],
		'id_pangkat_min' => ['type' => 'integer'],
		'id_pangkat_max' => ['type' => 'integer'],
		'kode_eselon' => ['type' => 'string', 'length' => 3],
		'keterangan' => ['type' => 'string', 'length' => 255],
		'is_pimpinan' => ['type' => 'string', 'length' => 1, 'required' => true],
		'info_left' => ['type' => 'integer', 'required' => true],
		'info_right' => ['type' => 'integer', 'required' => true],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
