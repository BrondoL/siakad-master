<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmamaterSeeder extends Seeder
{
	/**
	 * Jalankan seed
	 */
	public function run()
	{
		DB::table('lv_almamater')->insert([
			[
				'nama_almamater' => 'XS'
			], [
				'nama_almamater' => 'S'
			], [
				'nama_almamater' => 'M'
			], [
				'nama_almamater' => 'L'
			], [
				'nama_almamater' => 'XL'
			], [
				'nama_almamater' => 'XXL'
			], [
				'nama_almamater' => 'XXXL'
			], [
				'nama_almamater' => 'XXXXL'
			]
		]);
	}
}
