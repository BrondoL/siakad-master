<?php

namespace Siakad;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Laravel\Lumen\Routing\Controller as BaseController;
use Siakad\Response;

class Controller extends BaseController
{
	public $class;
	public $request;
	public $service;
	public $validator;

	/**
	 * Konstruktor: membuat instansi controller baru
	 * @param Request $request
	 */
	public function __construct(Request $request)
	{
		list(, $class) = explode('/', $request->path());
		$camel = ucfirst(Str::camel($class));

		$this->class = $class;
		$this->request = $request;
		$this->service = app('App\\Services\\' . $camel . 'Service');
		$this->validator = 'App\\Validators\\' . $camel . 'Validator'::class;
	}

	/**
	 * Mendapatkan data, satuan maupun daftar
	 * @param integer $id
	 * @return mixed
	 */
	public function index($id = null)
	{
		if ($id) {
			$id = $this->validator::getId($id);
			$data = $this->service->getData($id);

			return Response::show($data);
		} else {
			$param = $this->validator::getListParam($this->request->all());
			$data = $this->service->getList($param);

			return Response::show($data, null, true);
		}
	}

	/**
	 * Mendapatkan schema
	 * @return mixed
	 */
	public function getSchema()
	{
		$data = $this->service->getSchema();

		return Response::show($data);
	}

	/**
	 * Mendapatkan select
	 * @param integer $id
	 * @return mixed
	 */
	public function getSelect($id = null)
	{
		$param = $this->validator::getParamSelect($this->request->all());
		$data = $this->service->getSelect($id, $param);

		if($param)
			return Response::show($data, null, true);
		else
			return Response::show($data);
	}

	/**
	 * Menyimpan data baru
	 * @return mixed
	 */
	public function store()
	{
		$data = $this->service->store($this->request->all());

		return Response::show($data, 201);
	}

	/**
	 * Mengubah data
	 * @param integer $id
	 * @return mixed
	 */
	public function update($id)
	{
		$id = $this->validator::getId($id);
		$data = $this->service->update($id, $this->request->all());

		return Response::show($data);
	}

	/**
	 * Menghapus data, tanpa response
	 * @param integer $id
	 */
	public function delete($id = null)
	{
		// jadikan id array
		if (!$id) {
			$id = [];
			foreach ($this->request->all()['id'] ?? [''] as $v)
				$id[] = $this->validator::getId($v);
		} else
			$id = [$this->validator::getId($id)];

		$this->service->delete($id);
	}

	/**
	 * Otorisasi
	 * @param string scope
	 */
	public function checkAuth($scope)
	{
		if ($this->request->user() and Gate::denies('akses', $this->class . '_' . $scope))
			abort(403);
	}
}
