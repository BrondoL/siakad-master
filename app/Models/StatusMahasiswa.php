<?php

namespace App\Models;

use Siakad\Model;

class StatusMahasiswa extends Model
{
	protected $table = 'lv_status_mahasiswa';
	public static $ptModel = StatusMahasiswaOpt::class;
	public static $ptOptional = true;
}
