<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Siakad\Blueprint;

class CreateKemahasiswaanTable extends Migration
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

		$schema->create('ak_bidang_studi', function ($table) {
			$table->serial();
			$table->integer('id_unit');
			$table->string('kode_bidang', 5);
			$table->string('nama_bidang', 100);
			$table->string('nama_bidang_en', 100)->nullable();
			$table->log();
			$table->fk('id_unit')->on('ms_unit');
			$table->unique(['id_unit', 'kode_bidang']);
			$table->index('id_unit');
		});

		$schema->create('lv_kelas_perkuliahan', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->string('kode_kelas', 5);
			$table->string('nama_kelas', 50);
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->unique(['id_pt', 'kode_kelas']);
			$table->index('id_pt');
		});

		$schema->create('ms_tahun_kurikulum', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->string('tahun_kurikulum', 4);
			$table->string('nama_kurikulum', 100);
			$table->date('tgl_awal')->nullable();
			$table->date('tgl_akhir')->nullable();
			$table->integer('id_periode')->nullable();
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_periode')->on('ms_periode');
			$table->unique(['id_pt', 'tahun_kurikulum']);
			$table->index('id_pt');
		});

		// master
		$schema->create('lv_gelombang', function ($table) {
			$table->serial();
			$table->integer('kode_gelombang')->unique();
			$table->string('nama_gelombang', 100);
			$table->log();
		});

		$schema->create('lv_gelombang_pt', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->integer('id_gelombang');
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_gelombang')->on('lv_gelombang');
			$table->unique(['id_pt', 'id_gelombang']);
			$table->index('id_pt');
		});

		// master
		$schema->create('lv_jalur_pendaftaran', function ($table) {
			$table->serial();
			$table->string('nama_jalur', 100)->unique();
			$table->string('keterangan', 1000)->nullable();
			$table->string('kode_transfer', 2);
			$table->log();
		});

		$schema->create('lv_jalur_pendaftaran_pt', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->integer('id_jalur');
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_jalur')->on('lv_jalur_pendaftaran');
			$table->unique(['id_pt', 'id_jalur']);
			$table->index('id_pt');
		});

		// master
		$schema->create('lv_sistem_kuliah', function ($table) {
			$table->serial();
			$table->integer('kode_sistem')->unique();
			$table->string('nama_sistem', 100);
			$table->string('keterangan', 1000)->nullable();
			$table->flag('is_reguler', false);
			$table->log();
		});

		$schema->create('lv_sistem_kuliah_pt', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->integer('id_sistem');
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_sistem')->on('lv_sistem_kuliah');
			$table->unique(['id_pt', 'id_sistem']);
			$table->index('id_pt');
		});

		// opsional
		$schema->create('lv_pekerjaan', function ($table) {
			$table->serial();
			$table->integer('kode_pekerjaan')->unique();
			$table->string('nama_pekerjaan', 100);
			$table->log();
		});

		$schema->create('lv_pekerjaan_opt', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->integer('id_pekerjaan');
			$table->string('kode_emis', 2)->nullable();
			$table->string('kode_emis_mhs', 2)->nullable();
			$table->string('kode_emis_lulusan', 2)->nullable();
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_pekerjaan')->on('lv_pekerjaan');
			$table->unique(['id_pt', 'id_pekerjaan']);
		});

		// opsional
		$schema->create('lv_penghasilan', function ($table) {
			$table->serial();
			$table->integer('kode_penghasilan')->unique();
			$table->string('nama_penghasilan', 100);
			$table->integer('poin_bidik_misi')->default(0);
			$table->log();
		});

		$schema->create('lv_penghasilan_opt', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->integer('id_penghasilan');
			$table->string('kode_emis', 2)->nullable();
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_penghasilan')->on('lv_penghasilan');
			$table->unique(['id_pt', 'id_penghasilan']);
		});

		// child pt
		$schema->create('lv_status_mahasiswa', function ($table) {
			$table->serial();
			$table->string('kode_status', 2)->unique();
			$table->string('nama_status', 50);
			$table->log();
		});

		$schema->create('lv_status_mahasiswa_opt', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->integer('id_status');
			$table->string('kode_emis', 2)->nullable();
			$table->flag('is_diajukan', false);
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_status')->on('lv_status_mahasiswa');
			$table->unique(['id_pt', 'id_status']);
		});

		// single
		$schema->create('lv_almamater', function ($table) {
			$table->serial();
			$table->string('nama_almamater', 20);
			$table->log();
		});

		// single
		$schema->create('lv_jenis_tinggal', function ($table) {
			$table->serial();
			$table->integer('kode_tinggal')->unique();
			$table->string('nama_tinggal', 100);
			$table->log();
		});

		// single
		$schema->create('lv_transport', function ($table) {
			$table->serial();
			$table->integer('kode_transport')->unique();
			$table->string('nama_transport', 100);
			$table->log();
		});

		// single
		$schema->create('ms_universitas_prodi', function ($table) {
			$table->serial();
			$table->integer('id_universitas');
			$table->string('kode_prodi', 10);
			$table->string('nama_prodi', 100);
			$table->integer('id_jenjang')->nullable();
			$table->string('alamat', 100)->nullable();
			$table->string('telepon', 20)->nullable();
			$table->log();
			$table->unique(['id_universitas', 'kode_prodi']);
			$table->fk('id_universitas')->on('ms_universitas');
			$table->fk('id_jenjang')->on('lv_jenjang_pendidikan');
			$table->index('id_universitas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('ak_bidang_studi');
		Schema::dropIfExists('lv_kelas_perkuliahan');
		Schema::dropIfExists('ms_tahun_kurikulum');

		Schema::dropIfExists('lv_gelombang_pt');
		Schema::dropIfExists('lv_gelombang');
		Schema::dropIfExists('lv_jalur_pendaftaran_pt');
		Schema::dropIfExists('lv_jalur_pendaftaran');
		Schema::dropIfExists('lv_sistem_kuliah_pt');
		Schema::dropIfExists('lv_sistem_kuliah');

		Schema::dropIfExists('lv_pekerjaan_opt');
		Schema::dropIfExists('lv_pekerjaan');
		Schema::dropIfExists('lv_penghasilan_opt');
		Schema::dropIfExists('lv_penghasilan');
		Schema::dropIfExists('lv_status_mahasiswa_opt');
		Schema::dropIfExists('lv_status_mahasiswa');

		Schema::dropIfExists('lv_almamater');
		Schema::dropIfExists('lv_jenis_tinggal');
		Schema::dropIfExists('lv_transport');
		Schema::dropIfExists('ms_universitas_prodi');
	}
}
