<?php

namespace Siakad;

class Schema
{
	protected static $fields;

	/**
	 * Mendpatkan daftar validasi
	 * @return array
	 */
	public static function getValidation()
	{
		// daftar field yang di-skip
		$skip = [
			'id', 'id_pt', 'created_at', 'created_by',
			'updated_at', 'updated_by', 'updated_ip', 'updated_path',
			'deleted_at', 'deleted_by'
		];

		// daftar field yang dikosongi
		$empty = [
			'info_left', 'info_right'
		];

		// buat daftar validation
		$data = [];
		foreach (static::$fields as $k => $v) {
			if (in_array($k, $skip))
				continue;

			$validation = [];
			if (!in_array($k, $empty)) {
				if (!empty($v['required'])) {
					if(isset($v['default']))
						$validation[] = 'sometimes';
					else
						$validation[] = 'required';
				}
				if ($v['type'] == 'string' and $v['length'] > 1)
					$validation[] = 'max:' . $v['length'];
				if ($v['type'] == 'integer' and substr($k, 0, 3) !== 'id_')
					$validation[] = 'integer';
				if ($v['type'] == 'decimal')
					$validation[] = 'numeric';
				if (substr($k, 0, 3) === 'is_')
					$validation[] = 'boolean';
			}

			$data[$k] = implode('|', $validation);
		}

		return $data;
	}

	/**
	 * Mendpatkan daftar field
	 * @return array
	 */
	public static function getFields()
	{
		return static::$fields;
	}
}
