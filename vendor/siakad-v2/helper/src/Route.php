<?php

namespace Siakad;

use Illuminate\Support\Str;

class Route
{
	protected $router;
	protected $verdata;

	public function __construct($router, $verdata = null)
	{
		if ($verdata)
			ksort($verdata);

		$this->router = $router;
		$this->verdata = (array)$verdata;
	}

	/* get */

	public function get($path)
	{
		$route = $this;
		$this->router->get('v{version}/' . $path, function ($version) use ($route, $path) {
			// digunakan untuk action
			@list($class, $act) = explode('/', $path);

			// tanpa cek hak akses
			return $route->getController($class, $version, null, $act, false);
		});
	}

	public function getSchema()
	{
		$route = $this;
		$this->router->get('v{version}/{class}/schema', function ($version, $class) use ($route) {
			// tanpa cek hak akses
			return $route->getController($class, $version, null, 'schema', false);
		});
	}

	public function getSelect()
	{
		$route = $this;
		$this->router->get('v{version}/{class}/select[/{id}]', function ($version, $class, $id = null) use ($route) {
			// tanpa cek hak akses
			return $route->getController($class, $version, $id, 'select', false);
		});
	}

	public function getController($class, $version = null, $id = null, $act = null, $is_auth = true)
	{
		$ctrl = $this->createController($class, $version);
		if ($is_auth)
			$ctrl->checkAuth('read');

		if ($act) {
			// cek method
			$method = 'get' . $act;
			if (method_exists($ctrl, $method))
				return $ctrl->$method($id);
			else
				abort(404, 'action:' . $act);
		} else
			return $ctrl->index($id);
	}

	/* post */

	public function post($path)
	{
		$route = $this;
		$this->router->post('v{version}/' . $path, function ($version) use ($route, $path) {
			@list($class, $act) = explode('/', $path);

			// tanpa cek hak akses
			return $route->postController($class, $version, $act, false);
		});
	}

	public function postController($class, $version = null, $act = null, $is_auth = true)
	{
		$ctrl = $this->createController($class, $version);

		if ($act) {
			// cek method
			$method = 'go' . $act;
			if (method_exists($ctrl, $method)) {
				if ($is_auth)
					$ctrl->checkAuth($act);

				return $ctrl->$method();
			} else
				abort(404, 'action:' . $act);
		} else {
			if ($is_auth)
				$ctrl->checkAuth('insert');

			return $ctrl->store();
		}
	}

	/* misc */

	public function default()
	{
		$route = $this;

		// get
		$this->router->get('v{version}/{class}[/{id}]', function ($version, $class, $id = null) use ($route) {
			// digunakan untuk id
			return $route->getController($class, $version, $id);
		});

		// post
		$this->router->post('v{version}/{class}[/{act}]', function ($version, $class, $act = null) use ($route) {
			return $route->postController($class, $version, $act);
		});

		// put
		$this->router->put('v{version}/{class}/{id}', function ($version, $class, $id = null) use ($route) {
			// belum butuh dipisah
			$ctrl = $route->createController($class, $version);
			$ctrl->checkAuth('update');

			return $ctrl->update($id);
		});

		// delete
		$this->router->delete('v{version}/{class}[/{id}]', function ($version, $class, $id = null) use ($route) {
			// belum butuh dipisah
			$ctrl = $route->createController($class, $version);
			$ctrl->checkAuth('delete');

			return $ctrl->delete($id);
		});
	}

	public function createController($class, $version = null)
	{
		return app('App\\Http\\Controllers\\V' . $this->getVersion($class, $version) . '\\' . ucfirst(Str::camel($class)) . 'Controller');
	}

	public function getVersion($class, $version = null)
	{
		// karena versi 1 (default) tidak perlu didefinisikan
		$realver = '1';
		foreach ($this->verdata as $k => $v) {
			// jika versi tidak didefinisikan diambil yang terakhir
			if ($version and $k > $version)
				break;

			if (in_array($class, $v))
				$realver = $k;
		}

		return $realver;
	}
}
