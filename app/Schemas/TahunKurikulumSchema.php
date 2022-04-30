<?php

namespace App\Schemas;

use Siakad\Schema;

class TahunKurikulumSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_pt' => ['type' => 'integer', 'required' => true],
		'tahun_kurikulum' => ['type' => 'integer', 'required' => true],
		'nama_kurikulum' => ['type' => 'string', 'length' => 100, 'required' => true],
		'tgl_awal' => ['type' => 'date'],
		'tgl_akhir' => ['type' => 'date'],
		'id_periode' => ['type' => 'integer'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
