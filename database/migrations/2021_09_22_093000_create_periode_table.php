<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Siakad\Blueprint;

class CreatePeriodeTable extends Migration
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

		$schema->create('ms_tahun_ajaran', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->string('tahun_ajaran', 4);
			$table->string('nama_tahun_ajaran', 50);
			$table->log();
			$table->unique(['id_pt', 'tahun_ajaran']);
			$table->fk('id_pt')->on('ms_pt');
			$table->index('id_pt');
		});

		$schema->create('ms_periode', function ($table) {
			$table->serial();
			$table->integer('id_pt');
			$table->string('kode_periode', 5);
			$table->string('nama_periode', 100);
			$table->string('nama_singkat', 50)->nullable();
			$table->integer('id_tahun_ajaran');
			$table->date('tgl_awal')->nullable();
			$table->date('tgl_akhir')->nullable();
			$table->date('tgl_awal_uts')->nullable();
			$table->date('tgl_akhir_uts')->nullable();
			$table->date('tgl_awal_uas')->nullable();
			$table->date('tgl_akhir_uas')->nullable();
			$table->string('bulan_awal_tagihan', 6)->nullable();
			$table->string('bulan_akhir_tagihan', 6)->nullable();
			$table->integer('pertemuan_kuliah')->default(16)->nullable();
			$table->decimal('minimal_absensi', 5, 2)->default(80)->nullable();
			$table->flag('is_aktif', false);
			$table->log();
			$table->unique(['id_pt', 'kode_periode']);
			$table->fk('id_pt')->on('ms_pt');
			$table->fk('id_tahun_ajaran')->on('ms_tahun_ajaran');
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
		Schema::dropIfExists('ms_periode');
		Schema::dropIfExists('ms_tahun_ajaran');
	}
}
