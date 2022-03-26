<?php

namespace App\Models;

use Siakad\Model;

class SistemKuliahPt extends Model
{
	protected $table = 'lv_sistem_kuliah_pt';
	public static $ptFk = 'is_sistem';
	public static $ptModel = SistemKuliah::class;
}
