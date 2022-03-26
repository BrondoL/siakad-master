<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusMahasiswaSeeder extends Seeder
{
	/**
	 * Jalankan seed
	 */
	public function run()
	{
		DB::table('lv_status_mahasiswa')->insert([
			[
				'kode_status' => 'D',
				'nama_status' => 'Drop Out / Dikeluarkan'
			], [
				'kode_status' => 'H',
				'nama_status' => 'Hilang'
			], [
				'kode_status' => 'K',
				'nama_status' => 'Mengundurkan Diri / Keluar'
			], [
				'kode_status' => 'L',
				'nama_status' => 'Lulus'
			], [
				'kode_status' => 'P',
				'nama_status' => 'Putus Sekolah'
			], [
				'kode_status' => 'T',
				'nama_status' => 'Transfer / Mutasi'
			], [
				'kode_status' => 'W',
				'nama_status' => 'Wafat'
			]
		]);
	}
}
