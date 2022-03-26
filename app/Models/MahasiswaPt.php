<?php

namespace App\Models;

use Siakad\Model;

class MahasiswaPt extends Model
{
	protected $table = 'ak_mahasiswa_pt';
	public static $ptFk = 'id_mahasiswa';
}
