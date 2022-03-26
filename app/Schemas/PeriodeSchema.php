<?php

namespace App\Schemas;

use Siakad\Schema;

class PeriodeSchema extends Schema
{
	protected static $fields = [
		'id' => ['type' => 'integer', 'required' => true],
		'id_pt' => ['type' => 'integer', 'required' => true],
		'kode_periode' => ['type' => 'string', 'length' => 5, 'required' => true],
		'nama_periode' => ['type' => 'string', 'length' => 100, 'required' => true],
		'nama_singkat' => ['type' => 'string', 'length' => 50],
		'id_tahun_ajaran' => ['type' => 'integer', 'required' => true],
		'tgl_awal' => ['type' => 'date'],
		'tgl_akhir' => ['type' => 'date'],
		'tgl_awal_uts' => ['type' => 'date'],
		'tgl_akhir_uts' => ['type' => 'date'],
		'tgl_awal_uas' => ['type' => 'date'],
		'tgl_akhir_uas' => ['type' => 'date'],
		'bulan_awal_tagihan' => ['type' => 'string', 'length' => 6],
		'bulan_akhir_tagihan' => ['type' => 'string', 'length' => 6],
		'pertemuan_kuliah' => ['type' => 'integer', 'default' => '16'],
		'minimal_absensi' => ['type' => 'decimal', 'length' => 5, 'decimal' => 2, 'default' => '80'],
		'is_aktif' => ['type' => 'string', 'length' => 1, 'required' => true, 'default' => '0'],
		'created_at' => ['type' => 'datetimetz', 'default' => 'CURRENT_TIMESTAMP'],
		'created_by' => ['type' => 'integer'],
		'updated_at' => ['type' => 'datetimetz'],
		'updated_by' => ['type' => 'integer'],
		'updated_ip' => ['type' => 'string'],
		'updated_path' => ['type' => 'string', 'length' => 50],
		'id_ketua_ujian' => ['type' => 'integer'],
	];
}
