<?php

namespace Siakad;

use App\Models\Token;
use Firebase\JWT\JWT;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Redis;

class Access
{
	/* token */

	const TOKEN_LIFETIME = 604800;
	const TOKEN_ALGORITHM = ['HS256'];

	public static function getUser($request, $class = null)
	{
		// cek jwt isInvalid
		if (Token::where('token', $request->bearerToken())->exists()) {
			return null;
		}

		// cek jwt
		$jwt = $request->bearerToken();

		$service = $request->header('service');
		if ($service)
			$key = env('SERVICE_SECRET');
		else
			$key = env('JWT_SECRET');

		if ($jwt and $key) {
			try {
				$data = JWT::decode($jwt, $key, self::TOKEN_ALGORITHM);
			} catch (\Exception $e) {
				abort(401, 'token');
			}

			if (!empty($data->id)) {
				// token login
				if ($class)
					return $class::where('id', $data->id)->first()->makeHidden($class::addHidden());
				else
					$param = ['id' => $data->id];
			} else if (!empty($data->id_role_pt)) {
				// token hak akses
				$param = [
					'id' => $data->id_user,
					'id_pt' => $data->id_pt,
					'id_role_pt' => $data->id_role_pt,
					'id_unit' => Access::getUnit($data->id_unit, $data->id_pt)
				];
			} else if ($service)
				$param = ['service' => $service]; // token service

			if (!empty($param))
				return new GenericUser($param);
		}

		return false;
	}

	public static function createToken($data, $key_refresh)
	{
		// cek secret access token
		$key = env('JWT_SECRET');
		if (!$key)
			abort(401, 'incomplete');

		return [
			'access_token' => JWT::encode($data + [
				'exp' => time() + self::TOKEN_LIFETIME // tanpa iat dan nbf
			], $key),
			'token_type' => 'bearer',
			'expires_in' => self::TOKEN_LIFETIME,
			'refresh_token' => JWT::encode($data + [
				'sub' => $data['id'] ?? $data['id_user']
			], $key_refresh)
		];
	}

	public static function createServiceToken()
	{
		// cek secret access token
		$key = env('SERVICE_SECRET');
		if (!$key)
			abort(401, 'incomplete');

		return JWT::encode(['exp' => time() + 60], $key); // token jangka pendek
	}

	/* redis hak akses */

	public static function check($path_scope, $id_role_pt = null)
	{
		return $id_role_pt ? (bool)Redis::get('api_' . $path_scope . '_' . $id_role_pt) : true;
	}

	public static function clear($id_role_pt = null)
	{
		foreach (Redis::keys('api_*' . ($id_role_pt ? '_' . $id_role_pt : '')) as $v)
			Redis::del($v);
	}

	public static function set($path, $scope, $id_role_pt)
	{
		Redis::set('api_' . $path . '_' . $scope . '_' . $id_role_pt, true);
	}

	/* redis struktur unit */

	public static function clearUnit($id_pt = null)
	{
		foreach (Redis::keys('unit' . ($id_pt ? '_' . $id_pt : '') . '_*') as $v)
			Redis::del($v);
	}

	public static function getUnit($id_parent, $id_pt = null)
	{
		if($id_pt)
			$data = Redis::get('unit_' . $id_pt . '_' . $id_parent);
		else
			$data = Redis::get(Redis::keys('unit_*_' . $id_parent)[0]); // harusnya hanya satu

		if ($data)
			$data = json_decode($data, true);
		else
			$data = [];

		$data[] = $id_parent;

		return $data;
	}

	public static function setUnit($id_pt, $id_parent, $id_childs)
	{
		Redis::set('unit_' . $id_pt . '_' . $id_parent, $id_childs);
	}
}
