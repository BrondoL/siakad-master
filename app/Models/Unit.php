<?php

namespace App\Models;

use Siakad\Model;

class Unit extends Model
{
	protected $table = 'ms_unit';
	public static $order = 'id_pt, info_left';
	public static $isPt = true;

	const UNIVERSITAS = 'U';
	const FAKULTAS = 'F';
	const JURUSAN = 'J';
	const PRODI = 'P';

	public static function getListJenisUnit($id_pt)
	{
		// ambil flag fakultas dan jurusan di pt
		$pt = Pt::select('is_fakultas', 'is_jurusan')->find($id_pt)->toArray();

		$data = [self::UNIVERSITAS => 'Perguruan Tinggi'];
		if ($pt['is_fakultas'])
			$data = [self::FAKULTAS => 'Fakultas'];
		if ($pt['is_jurusan'])
			$data = [self::JURUSAN => 'Jurusan'];
		$data[self::PRODI] = 'Program Studi';

		return $data;
	}
}
