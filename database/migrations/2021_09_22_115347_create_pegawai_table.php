<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Siakad\Blueprint;

class CreatePegawaiTable extends Migration
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

		$schema->create('ak_pegawai', function ($table) {
			$table->serial();
			$table->string('nama', 100);
			$table->string('gelar_depan', 30)->nullable();
			$table->string('gelar_belakang', 100)->nullable();
			$table->char('jenis_kelamin', 1);
			$table->date('tgl_lahir')->nullable();
			$table->string('tempat_lahir', 100)->nullable();
			$table->string('alamat', 100)->nullable();
			$table->string('telepon', 20)->nullable();
			$table->string('email', 100)->nullable();
			$table->integer('id_agama')->nullable();
			$table->integer('id_universitas')->nullable();
			$table->integer('id_kota')->nullable();
			$table->integer('id_hobi')->nullable();
			$table->integer('id_minat')->nullable();
			$table->flag('show_hp', false);
			$table->flag('show_email', false);
			$table->flag('show_kota', false);
			$table->flag('show_hobi', false);
			$table->flag('show_minat', false);
			$table->flag('is_valid_email', false);
			$table->uuid('id_file_ttd')->nullable();
			$table->log();
			$table->fk('id_agama')->on('lv_agama');
			$table->fk('id_universitas')->on('ms_universitas');
			$table->fk('id_kota')->on('lv_kota');
			$table->fk('id_hobi')->on('lv_hobi');
			$table->fk('id_minat')->on('lv_minat');
		});

		$schema->create('ak_pegawai_pt', function ($table) {
			$table->serial();
			$table->integer('id_pegawai');
			$table->string('nip', 20);
			$table->string('nidn', 30)->nullable();
			$table->string('nupn', 50)->nullable();
			$table->string('nidk', 50)->nullable();
			$table->string('email_kampus', 100)->nullable();
			$table->integer('id_unit')->nullable();
			$table->integer('id_jenjang')->nullable();
			$table->integer('id_pangkat')->nullable();
			$table->integer('id_fungsional')->nullable();
			$table->integer('id_struktural')->nullable();
			$table->integer('id_jenis')->nullable();
			$table->integer('id_status')->nullable();
			$table->integer('id_bidang')->nullable();
			$table->string('tugas_luar', 100);
			$table->flag('is_dosen_luar', false);
			$table->flag('is_pengasuh', false);
			$table->flag('is_pembina_ukm', false);
			$table->flag('is_pembina_ekskul', false);
			$table->integer('kuota_pa')->nullable();
			$table->integer('kuota_pembimbing')->nullable();
			$table->flag('is_valid_email', false);
			$table->log();
			$table->fk('id_pegawai')->on('ak_pegawai');
			$table->fk('id_unit')->on('ms_unit');
			$table->fk('id_jenjang')->on('lv_jenjang_pendidikan');
			$table->fk('id_pangkat')->on('ms_pangkat');
			$table->fk('id_fungsional')->on('ms_jabatan_fungsional');
			$table->fk('id_struktural')->on('ms_jabatan_struktural');
			$table->fk('id_jenis')->on('ms_jenis_pegawai');
			$table->fk('id_status')->on('lv_status_pegawai');
			$table->fk('id_bidang')->on('lv_bidang_ilmu');
			$table->index('id_unit');
		});

		$schema->table('ms_periode', function ($table) {
			$table->integer('id_ketua_ujian')->nullable();
			$table->fk('id_ketua_ujian')->on('ak_pegawai_pt');
		});

		$schema->table('ms_unit', function ($table) {
			$table->integer('id_ketua')->nullable();
			$table->integer('id_sekretaris')->nullable();
			$table->integer('id_pembantu_1')->nullable();
			$table->integer('id_pembantu_2')->nullable();
			$table->integer('id_pembantu_3')->nullable();
			$table->integer('id_pembantu_4')->nullable();
			$table->fk('id_ketua')->on('ak_pegawai_pt');
			$table->fk('id_sekretaris')->on('ak_pegawai_pt');
			$table->fk('id_pembantu_1')->on('ak_pegawai_pt');
			$table->fk('id_pembantu_2')->on('ak_pegawai_pt');
			$table->fk('id_pembantu_3')->on('ak_pegawai_pt');
			$table->fk('id_pembantu_4')->on('ak_pegawai_pt');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$schema = DB::getSchemaBuilder();
		$schema->blueprintResolver(function ($table, $callback) {
			return new Blueprint($table, $callback);
		});

		$schema->table('ms_periode', function ($table) {
			$table->dropColumn('id_ketua_ujian');
		});

		$schema->table('ms_unit', function ($table) {
			$table->dropColumn(['id_ketua', 'id_sekretaris', 'id_pembantu_1', 'id_pembantu_2', 'id_pembantu_3', 'id_pembantu_4']);
		});

		Schema::dropIfExists('ak_pegawai_pt');
		Schema::dropIfExists('ak_pegawai');
	}
}
