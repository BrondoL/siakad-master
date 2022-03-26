<?php

namespace App\Models;

use Siakad\Model;

class PegawaiPt extends Model
{
	protected $table = 'ak_pegawai_pt';
	public static $ptFk = 'id_pegawai';
	public static $ptModel = Pegawai::class;
}
