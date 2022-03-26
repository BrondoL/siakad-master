<?php

namespace Siakad;

use Illuminate\Support\Arr;
use Siakad\Backend;

class Repository
{
	protected static $secondaryFields; // kolom pada tabel sekunder

	/**
	 * Mendapatkan model
	 * @return object
	 */
	public static function model()
	{
		return app(str_replace(['Repository', 'Repositories'], ['', 'Models'], get_called_class()));
	}

	/**
	 * Mendapatkan data satuan
	 * @param integer $id
	 */
	public static function getData($id)
	{
		$user = app('request')->user();
		$data = static::model()->dataPT($user->id_pt)
			->user($user)
			->findOrFail($id)
			->makeHidden(static::model()->addHidden());

		static::reformData($data);
		if (!$data)
			abort(404);

		return $data;
	}

	/**
	 * Mendapatkan daftar data
	 * @param array $param
	 * @param boolean $ispagination
	 */
	public static function getList($param, $ispagination = false)
	{
		$user = app('request')->user();

		if ($ispagination) {
			$page = static::getListBase($user, $param)
				->paginate($param['limit'], ['*'], 'page', $param['page']);
			$data = $page->makeHidden(static::model()->addHidden());
		} else {
			$data = static::getListBase($user, $param)
				->pager($param['limit'], $param['page'])
				->get()
				->makeHidden(static::model()->addHidden());
		}

		foreach ($data as $k => &$v) {
			if (!static::reformData($v))
				unset($data[$k]);
		}

		if ($ispagination) {
			$count = $page->count();
			$start = $count ? (($page->currentPage() - 1) * $page->perPage()) + 1 : 0;
			$end = $count ? ($start + $count) - 1 : 0;

			return [
				'data' => $data,
				'info' => [
					'total' => $page->total(),
					'page' => $page->currentPage(),
					'last_page' => $page->lastPage(),
					'count' => $count,
					'start' => $start,
					'end' => $end
				]
			];
		} else
			return $data;
	}

	/**
	 * Mendapatkan daftar data untuk tabel sekunder
	 * @param array $data
	 */
	public static function getSecondaryData($data)
	{
		if (static::$secondaryFields)
			return Arr::only($data, array_merge(['id'], static::$secondaryFields));
		else
			return $data;
	}

	/**
	 * Mendapatkan schema
	 */
	public static function getSchema()
	{
		$schema = app(str_replace(['Repository', 'Repositories'], ['Schema', 'Schemas'], get_called_class()));

		return $schema::getFields();
	}

	/**
	 * Mendapatkan select
	 * @param integer $id
	 * @param array $param
	 */
	public static function getSelect($id = null, $param = null)
	{
		$user = app('request')->user();
		$model = static::model();
		$value = $model::$selectLabel ?? 'id';

		if (empty($id)) {
			$data = $model->select('id as value', $value . ' as label')->user($user);

			if ($param) {
				$data = $data->where($value, 'ilike', '%' . $param['q'] . '%')
					->simplePaginate($param['limit'], ['*'], 'page', $param['page']);

				return [
					'data' => $data->items(),
					'info' => ['more' => $data->hasMorePages()]
				];
			}
			else
				return $data->get();
		} else
			return $model->select($value)->user($user)->findOrFail($id)->$value;
	}

	/**
	 * Mendapatkan dasar list
	 * @param object $user
	 * @param array $param
	 */
	protected static function getListBase($user, $param = null)
	{
		return static::model()->dataPT($user->id_pt ?? null)
			->custom()
			->user($user)
			->filter($param['filter'] ?? null)
			->order($param['sort'] ?? null);
	}

	/**
	 * Menyimpan data baru, gunakan transaksi di service
	 * @param array $data
	 */
	public static function store($data)
	{
		// sebelum store
		static::beforeStore($data);
		static::beforeSave($data);

		// store
		$new = static::storeRecord($data);

		// setelah store
		static::afterStore($new);
		static::afterSave($new);

		return $new;
	}

	/**
	 * Mengubah data, gunakan transaksi di service
	 * @param integer $id
	 * @param array $data
	 */
	public static function update($id, $data)
	{
		// cek data
		$user = app('request')->user();
		$old = static::model()->user($user)->findOrFail($id);

		// sebelum update
		static::beforeUpdate($data, $old);
		static::beforeSave($data, $old);

		// update
		$new = static::updateRecord($data, $old);

		// setelah update
		static::afterUpdate($new, $old);
		static::afterSave($new, $old);

		return $new;
	}

	/**
	 * Menghapus data, gunakan transaksi di service
	 * @param mixed $id bisa array
	 */
	public static function delete($id)
	{
		// cek data
		$user = app('request')->user();
		$old = static::model()->user($user)->findOrFail($id);

		// sebelum delete
		static::beforeDelete($old);

		// delete
		static::deleteRecord($old);

		// setelah delete
		static::afterDelete($old);
	}

	/**
	 * Menyimpan record data baru
	 * @param array $new
	 */
	protected static function storeRecord($new)
	{
		// tambahan log
		$model = static::model();
		$model->logRecord = static::getLog('create');

		// tambahan data pt
		$user = app('request')->user();
		if (!empty($user->id_pt) and ($model::$isPt or $model::$ptFk))
			$new['id_pt'] = $user->id_pt;

		// create data
		$new = $model->fill($new);
		$new->save();

		// select ulang
		$new = $model->find($new->id);

		return $new;
	}

	/**
	 * Mengubah record data
	 * @param array $new
	 * @param object $old
	 */
	protected static function updateRecord($new, $old)
	{
		// tambahan log
		$old->logRecord = static::getLog('update');

		// update data
		$old->update($new);

		return $old;
	}

	/**
	 * Menghapus record data
	 * @param object $old
	 */
	protected static function deleteRecord($old)
	{
		// cek soft delete
		if ($old::isSoftDelete()) {
			// update tanpa timestamp
			$old->timestamps = false;

			// update softdelete
			$data = [
				$old->getDeletedAtColumn() => $old->fromDateTime($old->freshTimestamp())
			] + static::getLog('delete', false);

			return $old->update($data);
		} else
			return $old->delete();
	}

	/**
	 * Sebelum menyimpan data baru
	 * @param array $new
	 */
	protected static function beforeStore(&$new)
	{
	}

	/**
	 * Sebelum mengubah data
	 * @param array $new
	 * @param object $old
	 */
	protected static function beforeUpdate(&$new, $old)
	{
	}

	/**
	 * Sebelum menyimpan data
	 * @param array $new
	 * @param object $old
	 */
	protected static function beforeSave(&$new, $old = null)
	{
	}

	/**
	 * Sebelum menghapus data
	 * @param object $old
	 */
	protected static function beforeDelete($old)
	{
	}

	/**
	 * Setelah menyimpan data baru
	 * @param object $new
	 */
	protected static function afterStore($new)
	{
	}

	/**
	 * Setelah mengubah data
	 * @param object $new
	 * @param object $old
	 */
	protected static function afterUpdate($new, $old)
	{
	}

	/**
	 * Setelah menyimpan data
	 * @param object $new
	 * @param object $old
	 */
	protected static function afterSave($new, $old = null)
	{
	}

	/**
	 * Setelah menghapus data
	 * @param object $old
	 */
	protected static function afterDelete($old)
	{
	}

	/**
	 * Mendapatkan record log
	 * @param string $act
	 * @param boolean $all semua kolom dengan yang tidak dipakai diset null
	 */
	protected static function getLog($act, $all = true)
	{
		if ($all) {
			$data = [
				'created_at' => null,
				'created_by' => null,
				'updated_at' => null,
				'updated_by' => null,
				'updated_ip' => null,
				'updated_path' => null,
				'deleted_at' => null,
				'deleted_by' => null
			];
		} else
			$data = [];

		if (!($act == 'delete' or static::model()->timestamps))
			return $data;

		$request = app('request');
		$id_user = $request->user()->id ?? null;

		switch ($act) {
			case 'create':
				$data['created_by'] = $id_user;
			case 'update':
				$data['updated_by'] = $id_user;
				$data['updated_ip'] = $request->ip();
				$data['updated_path'] = $request->path();
				break;
			case 'delete':
				$data['deleted_by'] = $id_user;
				break;
		}

		return $data;
	}

	/**
	 * reform data child
	 * @param object $data
	 */
	protected static function reformData(&$data)
	{
		$model = static::model();

		// cek atribut
		foreach ($data->toArray() as $k => $v) {
			/* // data pt
			if ($k == 'data_pt') {
				if (!empty($v)) {
					$fk = ($model::$ptModel)::$ptFk;
					unset($data->data_pt->$fk);
				} else if (!$model::$ptOptional) {
					$data = null;
					break;
				}
			}

			// data parent
			if ($k == 'data_parent')
				unset($data->data_parent->id); */

			// file
			if (substr($k, 0, 7) == 'id_file') {
				$kn = substr($k, 3);
				$data->$kn = $v ? (object)[
					'id' => $v,
					'token' => Backend::getFileToken($v)
				] : null;

				unset($data->$k);
			}
		}

		return $data;
	}
}
