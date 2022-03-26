<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Siakad\Blueprint;

class CreateKepegawaianTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$schema = DB::getSchemaBuilder();
		$schema->blueprintResolver(function ($table, $callback) {
			return new Blueprint($table, $callback);
		});

		// master
		$schema->create('lv_bidang_ilmu', function ($table) {
			$table->serial();
			$table->string('kode_bidang', 5)->unique();
			$table->string('nama_bidang', 50);
			$table->log();
		});

		$schema->create('lv_bidang_ilmu_pt', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->integer('id_bidang');
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_bidang')->on('lv_bidang_ilmu');
			$table->unique(['id_pt', 'id_bidang']);
			$table->index('id_pt');
		});

		// opsional
		$schema->create('ms_universitas', function ($table) {
			$table->serial();
			$table->string('kode_universitas', 20);
			$table->string('nama_universitas', 100);
			$table->string('alamat', 100)->nullable();
			$table->string('telepon', 20)->nullable();
			$table->log();
		});

		$schema->create('ms_universitas_opt', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->integer('id_universitas');
			$table->flag('is_pmb', false);
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_universitas')->on('ms_universitas');
			$table->unique(['id_pt', 'id_universitas']);
		});

		// single
		$schema->create('lv_hobi', function ($table) {
			$table->serial();
			$table->string('nama_hobi', 100);
			$table->log();
		});

		// single
		$schema->create('lv_minat', function ($table) {
			$table->serial();
			$table->string('nama_minat', 100);
			$table->log();
		});

		// single (temp)
		$schema->create('ms_pangkat', function ($table) {
			$table->serial();
			$table->string('kode_pangkat', 5)->unique();
			$table->string('nama_pangkat', 100);
			$table->log();
		});

		// single (temp)
		$schema->create('ms_jabatan_struktural', function ($table) {
			$table->serial();
			$table->string('kode_struktural', 10)->unique();
			$table->string('nama_struktural', 100);
			$table->string('nama_singkat', 50)->nullable();
			$table->integer('id_parent')->nullable();
			$table->integer('id_pangkat_min')->nullable();
			$table->integer('id_pangkat_max')->nullable();
			// $table->string('email', 100)->nullable();
			// $table->integer('beban_sks')->nullable();
			$table->string('kode_eselon', 3)->nullable();
			$table->string('keterangan', 255)->nullable();
			$table->flag('is_pimpinan');
			// $table->flag('is_aktif');
			$table->integer('info_left');
			$table->integer('info_right');
			$table->log();
			$table->fk('id_parent')->on('ms_jabatan_struktural');
			$table->fk('id_pangkat_min')->on('ms_pangkat');
			$table->fk('id_pangkat_max')->on('ms_pangkat');
		});

		// single (temp)
		$schema->create('ms_jabatan_fungsional', function ($table) {
			$table->serial();
			$table->string('kode_fungsional', 5)->unique();
			$table->string('nama_fungsional', 100);
			// $table->integer('sks_maksimal')->nullable();
			$table->log();
		});

		// single (temp)
		$schema->create('ms_jenis_pegawai', function ($table) {
			$table->serial();
			$table->string('kode_jenis', 5);
			$table->string('nama_jenis', 100);
			$table->char('tipe', 1)->nullable();
			$table->log();
		});

		// single (temp)
		$schema->create('lv_status_pegawai', function ($table) {
			$table->serial();
			$table->string('kode_status', 2);
			$table->string('nama_status', 100);
			$table->flag('is_keluar', false);
			$table->log();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('lv_bidang_ilmu_pt');
		Schema::dropIfExists('lv_bidang_ilmu');

		Schema::dropIfExists('ms_universitas_opt');
		Schema::dropIfExists('ms_universitas');

		Schema::dropIfExists('lv_hobi');
		Schema::dropIfExists('lv_minat');

		Schema::dropIfExists('lv_status_pegawai');
		Schema::dropIfExists('ms_jenis_pegawai');
		Schema::dropIfExists('ms_jabatan_fungsional');
		Schema::dropIfExists('ms_jabatan_struktural');
		Schema::dropIfExists('ms_pangkat');
	}
}
