<?php

namespace Siakad;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
	protected $hidden = [
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
		'updated_ip',
		'updated_path',
		'deleted_at',
		'deleted_by'
	];
	protected $guarded = [
		'id'
	];

	public $logRecord = []; // agar ketika update hanya log jika ada perubahan saja
	protected static $hiddenAdd = []; // tambahan data yang di-hidden

	public static $selectLabel; // label untuk select (dropdown / autocomplete)
	public static $order; // urutan default
	public static $isPt = false; // tabel memiliki field id_pt
	public static $isUnit = false; // tabel memiliki field id_unit

	public static $ptModel; // model tabel parent / pt
	public static $ptFk; // foreign key tabel parent
	public static $ptOptional = false; // tabel pt hanya berisi data custom

	/* record */

	// override
	public function setCreatedAt($value)
	{
		parent::setCreatedAt($value);

		foreach ($this->logRecord as $k => $v) {
			if (isset($v))
				$this->$k = $v;
			else
				unset($this->$k);
		}

		return $this;
	}

	// override
	public function setUpdatedAt($value)
	{
		parent::setUpdatedAt($value);

		foreach ($this->logRecord as $k => $v) {
			if (isset($v))
				$this->$k = $v;
			else
				unset($this->$k);
		}

		return $this;
	}

	/* select */

	public static function addHidden()
	{
		return static::$hiddenAdd;
	}

	/* scope */

	public function scopeUser($query, $user)
	{
		// pt
		if ($this::$isPt and $user->id_pt)
			$query->where('id_pt', $user->id_pt);

		// unit
		if ($this::$isUnit and $user->id_unit)
			$query->whereIn('id_unit', $user->id_unit);
	}

	public function scopeFilter($query, $filter = null)
	{
		// cek filter
		if ($filter) {
			foreach ($filter as $k => $v) {
				// terjemahkan nilai dan kolom
				$def = $this->getFilterDefinition($k, $v);

				if (is_array($def['value']))
					$query->whereIn($def['field'], $def['value']);
				else
					$query->where($def['field'], $def['value']);
			}
		}
	}

	public function scopeOrder($query, $sort = null)
	{
		// cek urutan
		$orderby = $sort ?? $this::$order;
		if ($orderby)
			$query->orderByRaw($orderby);
	}

	public function scopePager($query, $limit = null, $page = null)
	{
		// cek limit
		if ($limit) {
			$query->take($limit);
			if ($page and $page > 1)
				$query->skip(($page - 1) * $limit);
		}
	}

	public function scopeDataPT($query, $id_pt)
	{
		// cek child pt
		if ($this::$ptModel) {
			if ($this::$ptFk) {
				$query->with('data_parent');
			} else if ($id_pt) {
				$query->with(['data_pt' => function ($query) use ($id_pt) {
					$query->where('id_pt', $id_pt);
				}]);
			}
		}
	}

	public function scopeCustom($query)
	{
		// untuk di-extend
	}

	/* tabel pt, tidak camel case karena dijadikan index */

	public function data_pt()
	{
		if ($this::$ptModel and empty($this::$ptFk))
			return $this->hasOne($this::$ptModel, ($this::$ptModel)::$ptFk);
		else
			return null;
	}

	public function data_parent()
	{
		if ($this::$ptModel and $this::$ptFk)
			return $this->belongsTo($this::$ptModel, $this::$ptFk);
		else
			return null;
	}

	/* filter */

	protected static function getFilterDefinition($field, $value)
	{
		return [
			'field' => $field,
			'value' => $value
		];
	}

	/* tambahan */

	public static function isSoftDelete()
	{
		$uses = class_uses_recursive(static::class);

		return empty($uses['Illuminate\Database\Eloquent\SoftDeletes']) ? false : true;
	}
}
