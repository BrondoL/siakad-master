<?php

namespace App\Models;

use Siakad\Model;

class BidangIlmuPt extends Model
{
	protected $table = 'lv_bidang_ilmu_pt';
	public static $ptFk = 'id_bidang';
}
