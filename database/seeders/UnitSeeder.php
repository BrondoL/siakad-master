<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
	/**
	 * Jalankan seed dummy
	 */
	public function run()
	{
		foreach([
			[
				'id_pt' => 1,
				'nama_unit' => 'Universitas Sevima',
				'jenis_unit' => 'U',
				'info_left' => 1,
				'info_right' => 8
			], [
				'id_pt' => 1,
				'nama_unit' => 'Fakultas Teknologi Informasi',
				'jenis_unit' => 'F',
				'id_parent' => 1,
				'info_left' => 2,
				'info_right' => 7
			], [
				'id_pt' => 1,
				'nama_unit' => 'Teknik Informatika',
				'id_jenjang' => 1,
				'jenis_unit' => 'P',
				'id_parent' => 2,
				'info_left' => 3,
				'info_right' => 4
			], [
				'id_pt' => 1,
				'nama_unit' => 'Sistem Informasi',
				'id_jenjang' => 1,
				'jenis_unit' => 'P',
				'id_parent' => 2,
				'info_left' => 5,
				'info_right' => 6
			], [
				'id_pt' => 2,
				'nama_unit' => 'Institut Sevima',
				'jenis_unit' => 'U',
				'info_left' => 1,
				'info_right' => 4
			], [
				'id_pt' => 2,
				'nama_unit' => 'Akuntansi',
				'id_jenjang' => 1,
				'jenis_unit' => 'P',
				'id_parent' => 5,
				'info_left' => 2,
				'info_right' => 3
			]
		] as $v) {
			Unit::create($v);
		}
	}
}
