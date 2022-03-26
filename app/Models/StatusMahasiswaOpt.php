<?php

namespace App\Models;

use Siakad\Model;

class StatusMahasiswaOpt extends Model
{
	protected $table = 'lv_status_mahasiswa_opt';
	public static $ptFk = 'id_status';
	public static $ptModel = StatusMahasiswa::class;
}
