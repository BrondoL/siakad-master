<?php

namespace App\Models;

use Siakad\Model;

class TahunKurikulum extends Model
{
	protected $table = 'ms_tahun_kurikulum';
	public static $isPt = true;
	public static $ptFk = 'id_periode';
	public static $ptModel = Periode::class;
}
