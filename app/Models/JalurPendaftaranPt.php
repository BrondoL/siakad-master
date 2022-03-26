<?php

namespace App\Models;

use Siakad\Model;

class JalurPendaftaranPt extends Model
{
	protected $table = 'lv_jalur_pendaftaran_pt';
	public static $ptFk = 'id_jalur';
	public static $ptModel = JalurPendaftaran::class;
}
