<?php

namespace App\Models;

use Siakad\Model;

class JenjangPendidikanPt extends Model
{
	protected $table = 'lv_jenjang_pendidikan_pt';
	public static $ptFk = 'id_jenjang';
	public static $ptModel = JenjangPendidikan::class;
}
