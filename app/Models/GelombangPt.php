<?php

namespace App\Models;

use Siakad\Model;

class GelombangPt extends Model
{
	protected $table = 'lv_gelombang_pt';
	public static $ptFk = 'id_gelombang';
	public static $ptModel = Gelombang::class;
}
