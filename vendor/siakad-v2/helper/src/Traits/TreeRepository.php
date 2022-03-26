<?php

namespace Siakad\Traits;

use Illuminate\Support\Facades\DB;

trait TreeRepository
{
	/* event */

	/**
	 * Sebelum menyimpan data baru
	 * @param array $new
	 */
	protected static function beforeStore(&$new)
	{
		$model = static::model();

		if (empty($new['id_parent'])) {
			$id_pt = app('request')->user()->id_pt ?? null;

			if (empty($id_pt))
				abort(400, 'data:id_parent');
			else
				$info_left = $model->select('max(info_right) as info_right')->where('id_pt', $id_pt)->value('info_right') + 1;
		} else {
			$parent = $model->select('id_pt', 'info_right')->find($new['id_parent']);

			$id_pt = $parent->id_pt;
			$info_left = $parent->info_right;

			// buka tree
			static::insertNode($id_pt, $info_left, $info_left + 1);
		}

		// set data
		$new['info_left'] = $info_left;
		$new['info_right'] = $info_left + 1;
	}

	/**
	 * Sebelum mengubah data
	 * @param array $new
	 * @param object $old
	 */
	protected static function beforeUpdate(&$new, $old)
	{
		if (!empty($new['id_parent']) and $new['id_parent'] != $old->id_parent) {
			$model = static::model();

			// cek pergantian parent
			if (!empty($new['id_parent'])) {
				$new_parent = $model->find($new['id_parent']);
				if ($old and $new_parent->info_left >= $old->info_left and $new_parent->info_right <= $old->info_right)
					abort(400, 'data:id_parent');

				$info_left = $new_parent->info_right;
			}

			// lepaskan item dari tree dengan menegatifkan
			$gap = $old->info_right - $old->info_left;

			$model->where('id_pt', $old->id_pt)->where('info_left', '>=', $old->info_left)->where('info_right', '<=', $old->info_right)->update([
				'info_left' => DB::raw('info_left * -1'),
				'info_right' => DB::raw('info_right * -1')
			]);

			// tutup tree
			static::deleteNode($old);

			// buka tree
			if ($info_left) {
				if ($info_left > $old->info_right)
					$info_left -= 2;
			} else
				$info_left = $model->select('max(info_right) as info_right')->where('id_pt', $old->id_pt)->value('info_right') + 1;

			static::insertNode($old->id_pt, $info_left, $info_left + ($old->info_right - $old->info_left));

			// positifkan item
			$gap = $info_left - $old->info_left;

			$model->where('id_pt', $old->id_pt)->where('info_left', '<', 0)->update([
				'info_left' => DB::raw('(info_left * -1) + ' . $gap),
				'info_right' => DB::raw('(info_right * -1) + ' . $gap)
			]);
		}
	}

	/**
	 * Setelah menghapus data
	 * @param object $old
	 */
	protected static function afterDelete($old)
	{
		// tutup tree
		static::deleteNode($old);
	}

	/* method tree */

	/**
	 * Sebelum tambah node
	 * @param integer $id_pt
	 * @param integer $left
	 * @param integer $right
	 */
	protected static function insertNode($id_pt, $left, $right)
	{
		$model = static::model();
		$length = $right - $left + 1;

		$model->where('id_pt', $id_pt)->where('info_left', '>=', $left)->update([
			'info_left' => DB::raw('info_left + ' . $length)
		]);
		$model->where('id_pt', $id_pt)->where('info_right', '>=', $left)->update([
			'info_right' => DB::raw('info_right + ' . $length)
		]);
	}

	/**
	 * Setelah hapus node
	 * @param object $node
	 */
	protected static function deleteNode($node)
	{
		$model = static::model();
		$length = $node->info_right - $node->info_left + 1;

		$model->where('id_pt', $node->id_pt)->where('info_left', '>', $node->info_left)->update([
			'info_left' => DB::raw('info_left - ' . $length)
		]);
		$model->where('id_pt', $node->id_pt)->where('info_right', '>', $node->info_left)->update([
			'info_right' => DB::raw('info_right - ' . $length)
		]);
	}
}
