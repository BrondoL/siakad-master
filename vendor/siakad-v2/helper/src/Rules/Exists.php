<?php

namespace Siakad\Rules;

use Illuminate\Contracts\Validation\Rule;
use Siakad\Language;

class Exists implements Rule
{
	private $method;
	private $model;
	private $user;

	/**
	 * Create a new rule instance.
	 *
	 * @param $param
	 */
	public function __construct($param)
	{
		$this->model = $param['model'] ? 'App\\Models\\' . $param['model'] : null;
		$this->method = $param['method'];
		$this->user = $param['user'];
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param  string  $attribute
	 * @param  mixed  $value
	 * @return bool
	 */
	public function passes($attribute, $value)
	{
		$model = $this->model;
		if (class_exists($model)) {
			$method = $this->method;

			if ($method) {
				// parameternya id pt dulu :D
				if (!empty($this->user->id_pt))
					return array_key_exists($value, $model::$method($this->user->id_pt));
			} else {
				$query = $model::query();
				if (!empty($this->user->id_pt) and ($this->model::$isPt or $this->model::$ptFk))
					$query->where('id_pt', $this->user->id_pt);
				if ($this->model::isSoftDelete())
					$query->whereNull('deleted_at');

				if ($query->find($value))
					return true;
			}
		}

		return false;
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message()
	{
		return Language::getListValidationMessage()['exists'];
	}
}
