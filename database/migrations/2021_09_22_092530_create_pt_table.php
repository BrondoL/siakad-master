<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Siakad\Blueprint;

class CreatePtTable extends Migration
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

		$schema->create('ms_yayasan', function ($table) {
			$table->serial();
			$table->string('nama_yayasan', 100);
			$table->log();
		});

		$schema->create('ms_pt', function ($table) {
			$table->serial();
			$table->string('kode_pt', 20);
			$table->string('nama_pt', 100);
			$table->flag('is_fakultas');
			$table->flag('is_jurusan');
			$table->integer('id_yayasan')->nullable();
			$table->log();
			$table->fk('id_yayasan')->on('ms_yayasan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('ms_pt');
		Schema::dropIfExists('ms_yayasan');
	}
}
