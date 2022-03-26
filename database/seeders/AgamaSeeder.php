<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
	/**
	 * Jalankan seed
	 */
	public function run()
	{
		DB::table('lv_agama')->insert([
			[
				'kode_agama' => '1',
				'nama_agama' => 'Islam'
			], [
				'kode_agama' => '2',
				'nama_agama' => 'Kristen'
			], [
				'kode_agama' => '3',
				'nama_agama' => 'Katolik'
			], [
				'kode_agama' => '4',
				'nama_agama' => 'Hindu'
			], [
				'kode_agama' => '5',
				'nama_agama' => 'Budha'
			], [
				'kode_agama' => '6',
				'nama_agama' => 'Konghucu'
			], [
				'kode_agama' => '7',
				'nama_agama' => 'Lain-lain'
			]
		]);
	}
}
