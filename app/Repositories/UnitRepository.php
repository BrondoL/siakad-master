<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Siakad\Repository;
use Siakad\Traits\TreeRepository;

class UnitRepository extends Repository
{
	use TreeRepository {
		afterDelete as afterDeleteTree;
	}

	// tidak perlu id
	protected static $secondaryFields = [
		'id_pt', 'nama_unit', 'nama_unit_en', 'id_jenjang'
	];

	/**
	 * Mendapatkan daftar keturunan
	 * @param integer $id_pt
	 */
	public static function getListDescendant($id_pt = null)
	{
		return static::model()->from('ms_unit as p')
			->join('ms_unit as c', function ($join) {
				$join->on('c.id_pt', 'p.id_pt')
					->on('c.info_left', '>', 'p.info_left')
					->on('c.info_right', '<', 'p.info_right');
			})
			->select('p.id', 'p.id_pt', DB::raw('json_agg(c.id) as id_child'))
			->groupBy('p.id')
			->when($id_pt, function ($query, $id_pt) {
				return $query->where('p.id_pt', $id_pt);
			})
			->get();
	}
}
