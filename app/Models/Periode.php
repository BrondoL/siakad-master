<?php

namespace App\Models;

use Siakad\Model;

class Periode extends Model
{
	protected $table = 'ms_periode';

	public static $selectLabel = 'nama_periode';
	public static $order = 'kode_periode desc';
	public static $isPt = true;
}
