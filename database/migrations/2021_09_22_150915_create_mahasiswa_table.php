<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Siakad\Blueprint;

class CreateMahasiswaTable extends Migration
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

		$schema->create('ak_mahasiswa', function ($table) {
			$table->serial();
			$table->string('nama', 200);
			$table->string('gelar_depan', 30)->nullable();
			$table->string('gelar_belakang', 30)->nullable();
			$table->char('jenis_kelamin', 1);
			$table->string('tempat_lahir', 100);
			$table->date('tgl_lahir');
			$table->string('alamat', 255)->nullable();
			$table->string('telepon', 20)->nullable();
			$table->string('hp', 20)->nullable();
			$table->string('hp_2', 20)->nullable();
			$table->string('email', 100)->nullable();
			$table->string('gol_darah', 2)->nullable();
			$table->char('status_nikah', 1)->nullable();
			$table->string('nik', 30)->nullable();
			$table->string('no_kk', 30)->nullable();
			$table->string('rt', 5)->nullable();
			$table->string('rw', 5)->nullable();
			$table->string('dusun', 100)->nullable();
			$table->string('desa', 100)->nullable();
			$table->string('no_kps', 20)->nullable();
			$table->integer('id_agama')->nullable();
			$table->integer('id_negara')->nullable();
			$table->integer('id_kota')->nullable();
			$table->integer('id_kecamatan')->nullable();
			$table->integer('id_suku')->nullable();
			$table->integer('id_pekerjaan')->nullable();
			$table->integer('id_penghasilan')->nullable();
			$table->integer('id_tinggal')->nullable();
			$table->integer('id_transport')->nullable();
			$table->integer('id_hobi')->nullable();
			$table->integer('id_minat')->nullable();
			$table->string('no_rekening', 50)->nullable();
			$table->string('berat_badan', 3)->nullable();
			$table->string('tinggi_badan', 3)->nullable();
			$table->string('instansi_kerja', 100)->nullable();
			$table->string('email_ortu', 100)->nullable();
			$table->flag('show_hp', false);
			$table->flag('show_kota', false);
			$table->flag('show_hobi', false);
			$table->flag('show_minat', false);
			$table->flag('is_valid_email', false);
			$table->uuid('id_file_akta_kelahiran')->nullable();
			$table->log();
			$table->fk('id_agama')->on('lv_agama');
			$table->fk('id_negara')->on('ms_negara');
			$table->fk('id_kota')->on('lv_kota');
			$table->fk('id_kecamatan')->on('lv_kota');
			$table->fk('id_suku')->on('lv_suku');
			$table->fk('id_pekerjaan')->on('lv_pekerjaan');
			$table->fk('id_penghasilan')->on('lv_penghasilan');
			$table->fk('id_tinggal')->on('lv_jenis_tinggal');
			$table->fk('id_transport')->on('lv_transport');
			$table->fk('id_hobi')->on('lv_hobi');
			$table->fk('id_minat')->on('lv_minat');
		});

		$schema->create('ak_mahasiswa_pt', function ($table) {
			$table->serial();
			$table->integer('id_mahasiswa');
			$table->string('nim', 24);
			$table->integer('id_periode');
			$table->integer('id_unit');
			$table->integer('id_tahun');
			$table->integer('id_jalur')->nullable();
			$table->integer('id_gelombang')->nullable();
			$table->integer('id_sistem')->nullable();
			$table->integer('id_kelas')->nullable();
			$table->integer('id_bidang')->nullable();
			$table->integer('id_periode_akhir')->nullable();
			$table->string('email_kampus', 100)->nullable();
			$table->date('tgl_daftar')->nullable();
			$table->decimal('nilai_tpa', 5, 2)->nullable();
			$table->decimal('nilai_kesehatan', 5, 2)->nullable();
			$table->decimal('nilai_psikotes', 5, 2)->nullable();
			$table->decimal('nilai_wawancara', 5, 2)->nullable();
			$table->char('jenis_transfer', 1)->nullable();
			$table->string('kode_transfer', 2)->nullable();
			$table->string('kode_pendidikan_asal', 5)->nullable();
			$table->string('asal_smu', 50)->nullable();
			$table->string('alamat_smu', 1000)->nullable();
			$table->string('telepon_smu', 15)->nullable();
			$table->string('jurusan_smu', 30)->nullable();
			$table->integer('thn_lulus_smu')->nullable();
			$table->decimal('nem_smu', 5, 2)->nullable();
			$table->string('no_ijasah_smu', 50)->nullable();
			$table->string('nisn', 20)->nullable();
			$table->string('nupn', 20)->nullable();
			$table->integer('id_kota_smu')->nullable();
			$table->integer('id_propinsi_smu')->nullable();
			$table->date('tgl_transfer')->nullable();
			$table->string('nim_lama', 24)->nullable();
			$table->string('asal_pt', 100)->nullable();
			$table->string('prodi_pt', 100)->nullable();
			$table->string('nim_pt', 20)->nullable();
			$table->decimal('ipk_asal', 3, 2)->nullable();
			$table->integer('sks_asal')->nullable();
			$table->string('npsn', 20)->nullable();
			$table->integer('id_periode_transfer')->nullable();
			$table->integer('id_unit_asal')->nullable();
			$table->integer('id_tahun_asal')->nullable();
			$table->integer('id_universitas')->nullable();
			$table->integer('id_universitas_prodi')->nullable();
			$table->string('nirm', 20)->nullable();
			$table->string('nirl', 20)->nullable();
			$table->integer('id_almamater')->nullable();
			$table->flag('is_valid_email', false);
			$table->uuid('id_file_transkrip_asal')->nullable();
			$table->uuid('id_file_ijazah_akhir')->nullable();
			$table->uuid('id_file_surat_pindah')->nullable();
			$table->log();
			$table->fk('id_mahasiswa')->on('ak_mahasiswa');
			$table->fk('id_periode')->on('ms_periode');
			$table->fk('id_unit')->on('ms_unit');
			$table->fk('id_tahun')->on('ms_tahun_kurikulum');
			$table->fk('id_kelas')->on('lv_kelas_perkuliahan');
			$table->fk('id_jalur')->on('lv_jalur_pendaftaran');
			$table->fk('id_gelombang')->on('lv_gelombang');
			$table->fk('id_sistem')->on('lv_sistem_kuliah');
			$table->fk('id_bidang')->on('ak_bidang_studi');
			$table->fk('id_kota_smu')->on('lv_kota');
			$table->fk('id_propinsi_smu')->on('lv_kota');
			$table->fk('id_periode_transfer')->on('ms_periode');
			$table->fk('id_unit_asal')->on('ms_unit');
			$table->fk('id_tahun_asal')->on('ms_tahun_kurikulum');
			$table->fk('id_universitas')->on('ms_universitas');
			$table->fk('id_universitas_prodi')->on('ms_universitas_prodi');
			$table->fk('id_periode_akhir')->on('ms_periode');
			$table->fk('id_almamater')->on('lv_almamater');
			$table->index('id_mahasiswa');
			$table->index('nim');
			$table->index('id_unit');
		});

		$schema->create('ak_mahasiswa_keluar', function ($table) {
			$table->serial();
			$table->integer('id_mahasiswa_pt')->unique();
			$table->integer('id_periode');
			$table->integer('id_status');
			$table->date('tgl_sk')->nullable();
			$table->string('no_sk', 100)->nullable();
			$table->uuid('id_file_sk')->nullable();
			$table->log();
			$table->fk('id_mahasiswa_pt')->on('ak_mahasiswa_pt');
			$table->fk('id_periode')->on('ms_periode');
			$table->fk('id_status')->on('lv_status_mahasiswa');
			$table->index('id_mahasiswa_pt');
		});

		$schema->create('ak_keluarga_mhs', function ($table) {
			$table->serial();
			$table->integer('id_mahasiswa');
			$table->char('status_keluarga', 1);
			$table->string('nama', 200);
			$table->date('tgl_lahir')->nullable();
			$table->string('alamat', 255)->nullable();
			$table->string('telepon', 20)->nullable();
			$table->string('email', 100)->nullable();
			$table->string('nik', 100)->nullable();
			$table->flag('is_nik_aktif', false);
			$table->integer('id_jenjang')->nullable();
			$table->integer('id_pekerjaan')->nullable();
			$table->integer('id_penghasilan')->nullable();
			$table->string('instansi_kerja', 30)->nullable();
			$table->char('status_kondisi', 1)->nullable();
			$table->char('status_kerabat', 1)->nullable();
			$table->log();
			$table->fk('id_mahasiswa')->on('ak_mahasiswa');
			$table->fk('id_jenjang')->on('lv_jenjang_pendidikan');
			$table->fk('id_pekerjaan')->on('lv_pekerjaan');
			$table->fk('id_penghasilan')->on('lv_penghasilan');
			$table->unique(['id_mahasiswa', 'status_keluarga']);
			$table->index('id_mahasiswa');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('ak_keluarga_mhs');
		Schema::dropIfExists('ak_mahasiswa_keluar');
		Schema::dropIfExists('ak_mahasiswa_pt');
		Schema::dropIfExists('ak_mahasiswa');
	}
}
