<?php

namespace App\Models;

use Siakad\Model;

class TahunAjaran extends Model
{
	protected $table = 'ms_tahun_ajaran';

	public static $selectLabel = 'nama_tahun_ajaran';
	public static $order = 'tahun_ajaran desc';
	public static $isPt = true;
}
