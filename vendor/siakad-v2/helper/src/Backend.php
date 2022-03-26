<?php

namespace Siakad;

use Illuminate\Support\Facades\Http;
use Siakad\Access;

class Backend
{
	const AUTH = 'AUTH';
	const SSO = 'SSO';
	const MASTER = 'MASTER';
	const MK = 'MK';
	const KULIAH = 'KULIAH';
	const PERKULIAHAN = 'PERKULIAHAN';
	const NILAI = 'NILAI';

	private static $chain;
	private static $self;
	private static $url;

	public function __construct($type)
	{
		self::$self = env('SERVICE_SELF');
		self::$url = env('SERVICE_' . $type) . '/v' . env('APP_VERSION', 1) . '/';
	}

	public static function auth()
	{
		return new self(self::AUTH);
	}

	public static function sso()
	{
		return new self(self::SSO);
	}

	public static function master()
	{
		return new self(self::MASTER);
	}

	public static function mk()
	{
		return new self(self::MK);
	}

	public static function kuliah()
	{
		return new self(self::KULIAH);
	}

	public static function perkuliahan()
	{
		return new self(self::PERKULIAHAN);
	}

	public static function nilai()
	{
		return new self(self::NILAI);
	}

	public static function chain($services)
	{
		$service = array_shift($services);
		self::$chain = $services;

		return new self($service);
	}

	public static function client()
	{
		$header = ['service' => self::$self];
		if ($lang = app('request')->header('lang'))
			$header['lang'] = $lang;
		if ($chain = self::$chain)
			$header['chain'] = implode(',', $chain);

		return Http::timeout($chain ? 0 : 30)
			->withHeaders($header)
			->withToken(Access::createServiceToken());
	}

	public function get($path, $data = null)
	{
		return $this->request('GET', $path, $data);
	}

	public function post($path, $data = [])
	{
		return $this->request('POST', $path, $data);
	}

	public function put($path, $data = [])
	{
		return $this->request('PUT', $path, $data);
	}

	public function delete($path, $data = [])
	{
		return $this->request('DELETE', $path, $data);
	}

	public function request($method, $path, $data = [])
	{
		switch ($method) {
			case 'GET':
				$response = $this::client()->get(self::$url . $path, $data);
				break;
			case 'POST':
				$response = $this::client()->post(self::$url . $path, $data);
				break;
			case 'PUT':
				$response = $this::client()->put(self::$url . $path, $data);
				break;
			case 'DELETE':
				$response = $this::client()->delete(self::$url . $path, $data);
				break;
			default:
				abort(500);
		}

		return self::getResponse($response, $method . ' ' . self::$url . $path);
	}

	protected static function getResponse($response, $path = null)
	{
		$data = $response->json();
		if (!empty($data['error'])) {
			abort(502, json_encode([
				'debug' => ($path ? ['path' => $path] : []) + $data['error']
			]));
		}

		return $data['data'] ?? null;
	}

	public static function getFileToken($id)
	{
		return md5(substr($id, 0, 10) . '-' . $id);
	}

	public static function continueChain()
	{
		// untunglah request bisa diakses di mana-mana :D
		$request = app('request');

		if ($request->header('service') and $request->header('chain')) {
			// path tanpa versi
			list(, $path) = explode('/', $request->path(), 2);

			// lanjutkan chain
			$post = $request->all();
			unset($post['debug']);

			self::chain(explode(',', $request->header('chain')))
				->request($request->method(), $path, $post);

			return true;
		}

		return false;
	}
}
