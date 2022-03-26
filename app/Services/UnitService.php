<?php

namespace App\Services;

use Siakad\Access;
use Siakad\Backend;
use Siakad\Service;

class UnitService extends Service
{
	// protected $chain = [Backend::AUTH, Backend::MK];

	/**
	 * Simpan data ke cache
	 * @param integer $id_pt
	 */
	public function cache($id_pt = null)
	{
		// hapus cache
		Access::clearUnit($id_pt);

		// hanya ambil yang punya anak agar hemat memori
		$rows = $this->repo::getListDescendant($id_pt);

		foreach ($rows as $row)
			Access::setUnit($row->id_pt, $row->id, $row->id_child);
	}
}
