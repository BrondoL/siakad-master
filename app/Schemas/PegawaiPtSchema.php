<?php

namespace App\Schemas;

use Siakad\Schema;

class PegawaiPtSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_pegawai' => ['type' => 'integer', 'required' => true],
		'nip' => ['type' => 'string', 'length' => 20, 'required' => true],
		'nidn' => ['type' => 'string', 'length' => 30],
		'nupn' => ['type' => 'string', 'length' => 50],
		'nidk' => ['type' => 'string', 'length' => 50],
		'email_kampus' => ['type' => 'string', 'length' => 100],
		'id_unit' => ['type' => 'integer'],
		'id_jenjang' => ['type' => 'integer'],
		'id_pangkat' => ['type' => 'integer'],
		'id_fungsional' => ['type' => 'integer'],
		'id_struktural' => ['type' => 'integer'],
		'id_jenis' => ['type' => 'integer'],
		'id_status' => ['type' => 'integer'],
		'id_bidang' => ['type' => 'integer'],
		'tugas_luar' => ['type' => 'string', 'length' => 100, 'required' => true],
		'is_dosen_luar' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'is_pengasuh' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'is_pembina_ukm' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'is_pembina_ekskul' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'kuota_pa' => ['type' => 'integer'],
		'kuota_pembimbing' => ['type' => 'integer'],
		'is_valid_email' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
	];
}
