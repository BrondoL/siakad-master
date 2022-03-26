<?php

namespace App\Models;

use Siakad\Model;

class Gelombang extends Model
{
	protected $table = 'lv_gelombang';
	public static $ptModel = GelombangPt::class;
}
