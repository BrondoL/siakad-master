<?php

namespace Siakad;

use Symfony\Component\HttpFoundation\Response;

// masih manual semua :D
class Language
{
	public static function getErrorMessage($code, $label)
	{
		if (($pos = strpos($label, ':')) !== false) {
			$type = substr($label, 0, $pos++);
			$value = substr($label, $pos);
		} else {
			$type = $label;
			$value = '';
		}

		if (self::getLanguage() == 'en') {
			// hanya yang ada type atau value-nya
			if ($value) {
				switch ($code) {
					case Response::HTTP_BAD_REQUEST: // 400
						if($type == 'required')
							return $value . ' is required';
						else
							return 'Invalid ' . $value;
					case Response::HTTP_UNAUTHORIZED: // 401
						switch ($type) {
							case 'inactive':
								return 'Inactive user';
							case 'incomplete':
								return 'System access is not opened';
							case 'login':
								return 'Invalid username or password';
							case 'token':
								return 'Invalid token';
						}
					case Response::HTTP_FORBIDDEN: // 403
						switch ($type) {
							case 'delete':
								return 'Delete is forbidden';
						}
					case Response::HTTP_NOT_FOUND: // 404
						return $value . ' is not found';
				}
			}

			return ucfirst(Response::$statusTexts[$code] ?? 'unknown status');
		} else { // id
			switch ($code) {
				case Response::HTTP_BAD_REQUEST: // 400
					switch ($type) {
						case 'required':
							return 'Data ' . $value . ' harus diisi';
						case 'data':
							$str = 'Data ' . $value;
							break;
						default:
							$str = 'Data yang dikirimkan';
					}
					return $str . ' tidak valid';
				case Response::HTTP_UNAUTHORIZED: // 401
					switch ($type) {
						case 'inactive':
							return 'Status user tidak aktif';
						case 'incomplete':
							return 'Akses sistem belum dibuka';
						case 'login':
							return 'Username dan password anda tidak sesuai';
						case 'token':
							return 'Token tidak valid';
						default:
							return 'Anda tidak memiliki akses ke sistem';
					}
				case Response::HTTP_FORBIDDEN: // 403
					switch ($type) {
						case 'delete':
							$str = 'menghapus';
							break;
						default:
							$str = 'mengakses';
					}
					return 'Anda tidak berhak ' . $str . ' data ini';
				case Response::HTTP_NOT_FOUND: // 404
					switch ($type) {
						case 'action':
							$str = 'Aksi ' . $value;
							break;
						case 'data':
							$str = 'Data ' . $value;
							break;
						default:
							$str = 'Data';
					}
					return $str . ' tidak ditemukan';
				case Response::HTTP_BAD_GATEWAY: // 502
					return 'Terjadi kesalahan pada koneksi antar sistem';
				default: // case Response::HTTP_INTERNAL_SERVER_ERROR: // 500
					return 'Terjadi kesalahan pada sistem';
			}
		}
	}

	public static function getListValidationMessage()
	{
		if (self::getLanguage() == 'en') {
			return [
				'exists' => 'Invalid',
				'integer' => 'Must be an integer',
				'max' => 'Must not be greater than :max character',
				'required' => 'Required',
				'unique' => 'Has been taken'
			];
		} else { // id
			return [
				'exists' => 'Tidak valid',
				'integer' => 'Harus berupa bilangan',
				'max' => 'Tidak boleh melebihi :max karakter',
				'required' => 'Harus diisi',
				'unique' => 'Sudah ada'
			];
		}
	}

	public static function getLanguage()
	{
		return app('request')->header('lang') ?? 'id';
	}
}
