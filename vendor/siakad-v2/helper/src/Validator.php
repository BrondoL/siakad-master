<?php

namespace Siakad;

use Illuminate\Support\Facades\Validator as CoreValidator;
use Siakad\Language;
use Siakad\Rules\Exists;
use Siakad\Rules\Unique;

class Validator
{
	/**
	 * Daftar validasi
	 * @return array
	 */
	public static function validation()
	{
		$schema = str_replace(['Validator', 'Validators'], ['Schema', 'Schemas'], get_called_class());

		return $schema::getValidation();
	}

	/**
	 * Validasi dan slice data
	 * @param array $data
	 * @param array $validation
	 * @param array $user
	 */
	public static function validateBy($data, $validation, $user = null)
	{
		return static::validate($data, $user, null, $validation);
	}

	/**
	 * Validasi data
	 * @param array $data
	 * @param array $user
	 * @param integer $id
	 * @param array $validation
	 * @return array
	 */
	public static function validate($data, $user, $id = null, $validation = null)
	{
		if ($validation or $validation = static::validation()) {
			// ubah validation
			foreach ($validation as $k => $v) {
				if (!is_array($v))
					$v = explode('|', $v);

				$changed = false;
				foreach ($v as $ki => $vi) {
					if ($vi == 'required' and $id) {
						$changed = true;
						$v[] = 'sometimes';
					} else if (substr($vi, 0, 7) == 'exists_') {
						// skip warning karena opsional
						@list(, $t_model, $t_method) = explode('_', $vi);

						$changed = true;
						$v[$ki] = new Exists([
							'model' => $t_model,
							'method' => $t_method,
							'user' => $user
						]);
					} else if (substr($vi, 0, 7) == 'unique_') {
						list(, $t_model) = explode('_', $vi);

						$changed = true;
						$v[$ki] = new Unique([
							'model' => $t_model,
							'id' => $id,
							'user' => $user
						]);
					}
				}

				if ($changed)
					$validation[$k] = $v;
			}

			$validator = CoreValidator::make($data, $validation, Language::getListValidationMessage());
			if ($validator->fails())
				return $validator->errors()->messages();
		}

		return null;
	}

	/**
	 * Validasi id
	 * @param integer $id
	 */
	public static function getId($id)
	{
		// hanya cek integer
		if ($id and filter_var($id, FILTER_VALIDATE_INT))
			return (int)$id;
		else
			abort(400);
	}

	/**
	 * Mendapatkan parameter list
	 * @param array $param
	 */
	public static function getListParam($param)
	{
		return [
			'filter' => $param['filter'] ?? null,
			'limit' => $param['limit'] ?? 10,
			'page' => $param['page'] ?? 1,
			'sort' => $param['sort'] ?? null
		];
	}

	/**
	 * Mendapatkan parameter select
	 * @param array $param
	 */
	public static function getParamSelect($param)
	{
		if(!empty($param['q'])) {
			return [
				'q' => $param['q'],
				'limit' => $param['limit'] ?? 20,
				'page' => $param['page'] ?? 1
			];
		}
		else
			return null;
	}

	/**
	 * Mendapatkan field fillable
	 */
	public static function getFillable()
	{
		return array_keys(static::validation());
	}

	/**
	 * Cek harus diisi
	 * @param array $data
	 * @param array $keys
	 */
	public static function required($data, $keys) {
		if(is_array($keys)) {
			foreach($keys as $key) {
				if(empty($data[$key]))
					abort(400, 'required:$'.$key);
			}
		}
		else if(empty($data))
			abort(400, 'required:$'.$keys);

		return $data;
	}
}
