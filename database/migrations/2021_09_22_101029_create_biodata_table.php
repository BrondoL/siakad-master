<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Siakad\Blueprint;

class CreateBiodataTable extends Migration
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

		// single
		$schema->create('lv_agama', function ($table) {
			$table->serial();
			$table->integer('kode_agama')->unique();
			$table->string('nama_agama', 30);
			$table->log();
		});

		// single
		$schema->create('lv_kota', function ($table) {
			$table->serial();
			$table->string('kode_kota', 10)->unique();
			$table->string('nama_kota', 100);
			$table->integer('id_parent')->nullable();
			$table->char('level', 1);
			$table->string('kode_iso', 5)->nullable();
			$table->string('kode_dikti', 10)->nullable();
			$table->log();
			$table->fk('id_parent')->on('lv_kota');
		});

		// single
		$schema->create('lv_suku', function ($table) {
			$table->serial();
			$table->integer('kode_suku');
			$table->string('nama_suku', 100);
			$table->log();
		});

		// single
		$schema->create('ms_negara', function ($table) {
			$table->serial();
			$table->string('kode_negara', 5)->unique();
			$table->string('nama_kota', 100);
			$table->string('kode_emis', 2)->nullable();
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
		Schema::dropIfExists('lv_agama');
		Schema::dropIfExists('lv_kota');
		Schema::dropIfExists('lv_suku');
		Schema::dropIfExists('ms_negara');
	}
}
