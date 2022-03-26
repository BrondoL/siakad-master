<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pt;

class PtSeeder extends Seeder
{
	/**
	 * Jalankan seed dummy
	 */
	public function run()
	{
		foreach([
			[
				'kode_pt' => '1',
				'nama_pt' => 'Universitas Sevima',
				'is_fakultas' => '1',
				'is_jurusan' => '0'
			], [
				'kode_pt' => '2',
				'nama_pt' => 'Institut Sevima',
				'is_fakultas' => '0',
				'is_jurusan' => '0'
			]
		] as $v) {
			Pt::create($v);
		}
	}
}
