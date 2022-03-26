<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Siakad\Blueprint;

class CreateUnitTable extends Migration
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
		$schema->create('lv_jenjang_pendidikan', function ($table) {
			$table->serial();
			$table->string('kode_jenjang', 5)->unique();
			$table->string('nama_jenjang', 100);
			$table->string('nama_jenjang_en', 100)->nullable();
			$table->flag('is_akademik');
			$table->flag('is_univ');
			$table->integer('urutan')->nullable();
			$table->log();
		});

		$schema->create('lv_jenjang_pendidikan_pt', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->integer('id_jenjang');
			$table->integer('max_cuti')->nullable();
			$table->integer('max_studi')->nullable();
			$table->integer('masa_studi')->nullable();
			$table->decimal('default_nilai', 3, 2)->nullable();
			$table->string('kode_nim', 3)->nullable();
			$table->string('kode_emis', 2)->nullable();
			$table->string('kode_emis_pasca', 2)->nullable();
			$table->string('deskripsi', 500)->nullable();
			$table->flag('is_pt');
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->unique(['id_pt', 'id_jenjang']);
			$table->index('id_pt');
		});

		$schema->create('ms_unit', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->string('nama_unit', 100);
			$table->string('nama_unit_en', 100)->nullable();
			$table->string('nama_singkat', 50)->nullable();
			$table->integer('id_parent')->nullable();
			$table->integer('id_jenjang')->nullable();
			$table->char('jenis_unit', 1);
			$table->string('alamat', 100)->nullable();
			$table->string('telepon', 20)->nullable();
			$table->string('email', 100)->nullable();
			$table->string('website', 100)->nullable();
			$table->string('gelar', 10)->nullable();
			$table->string('gelar_en', 10)->nullable();
			$table->string('deskripsi_gelar', 100)->nullable();
			$table->string('deskripsi_gelar_en', 100)->nullable();
			$table->string('akreditasi', 2)->nullable();
			$table->string('sk_akreditasi', 100)->nullable();
			$table->date('tgl_akreditasi')->nullable();
			$table->date('tgl_sk_pendirian')->nullable();
			$table->integer('id_periode_berdiri')->nullable();
			$table->integer('sks_lulus_min')->nullable();
			$table->decimal('ipk_lulus_min', 3, 2)->nullable();
			$table->integer('batas_sks_awal')->nullable();
			$table->integer('jumlah_pembimbing')->nullable();
			$table->integer('jumlah_penguji')->nullable();
			$table->char('id_jenis_ta', 1)->nullable(); // tanpa fk
			$table->string('kode_nim', 3)->nullable();
			$table->string('foto', 100)->nullable();
			$table->string('keterangan', 5000)->nullable();
			$table->string('visi', 5000)->nullable();
			$table->string('misi', 5000)->nullable();
			$table->string('kompetensi', 5000)->nullable();
			$table->string('cp', 5000)->nullable();
			$table->flag('is_aktif', true);
			$table->flag('is_eksternal', false);
			$table->integer('info_left');
			$table->integer('info_right');
			$table->log();
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_parent')->on('ms_unit');
			$table->fk('id_jenjang')->on('lv_jenjang_pendidikan');
			$table->fk('id_periode_berdiri')->on('ms_periode');
			$table->index('id_pt');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('ms_unit');
		Schema::dropIfExists('lv_jenjang_pendidikan_pt');
		Schema::dropIfExists('lv_jenjang_pendidikan');
	}
}
