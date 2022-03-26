<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenjangPendidikan;

class JenjangPendidikanSeeder extends Seeder
{
	/**
	 * Jalankan seed dummy
	 */
	public function run()
	{
		foreach([
			[
				'kode_jenjang' => 'S1',
				'nama_jenjang' => 'Sarjana',
				'is_akademik' => '1',
				'is_univ' => '1'
			], [
				'kode_jenjang' => 'D3',
				'nama_jenjang' => 'Diploma 3',
				'is_akademik' => '1',
				'is_univ' => '1'
			]
		] as $v) {
			JenjangPendidikan::create($v);
		}
	}
}
