<?php

namespace Siakad;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Service
{
	protected $chain = [];
	protected $class;
	public $repo;
	public $user;
	public $validator;

	/**
	 * Konstruktor: membuat instansi service baru
	 * @param Request $request
	 */
	public function __construct(Request $request)
	{
		list(, $class) = explode('/', $request->path());
		$camel = ucfirst(Str::camel($class));

		$this->class = $class;
		$this->user = $request->user();
		$this->repo = 'App\\Repositories\\' . $camel . 'Repository'::class;
		$this->validator = 'App\\Validators\\' . $camel . 'Validator'::class;
	}

	/**
	 * Mendapatkan data satuan
	 * @param integer $id
	 * @return array
	 */
	public function getData($id)
	{
		return $this->repo::getData($id);
	}

	/**
	 * Mendapatkan daftar data
	 * @param array $param
	 * @return array
	 */
	public function getList($param)
	{
		return $this->repo::getList($param, true);
	}

	/**
	 * Mendapatkan schema
	 * @return array
	 */
	public function getSchema()
	{
		return $this->repo::getSchema();
	}

	/**
	 * Mendapatkan select
	 * @param integer $id
	 * @param array $param
	 * @return array
	 */
	public function getSelect($id, $param)
	{
		return $this->repo::getSelect($id, $param);
	}

	/**
	 * Menyimpan data baru
	 * @param array $data
	 * @return object
	 */
	public function store($data)
	{
		// validasi data
		if ($errors = $this->validator::validate($data, $this->user)) {
			abort(400, json_encode([
				'validation' => $errors
			]));
		}

		// mulai transaksi
		DB::beginTransaction();

		$new = $this->repo::store($data, $this->validator::getFillable());

		// event tambahan
		$this->fireEvent('create', [
			'new' => $new
		]);

		// commit transaksi
		DB::commit();

		return $new;
	}

	/**
	 * Mengubah data
	 * @param integer $id
	 * @param array $data
	 * @return array
	 */
	public function update($id, $data)
	{
		// validasi data
		if ($errors = $this->validator::validate($data, $this->user, $id)) {
			abort(400, json_encode([
				'validation' => $errors
			]));
		}

		// mulai transaksi
		DB::beginTransaction();

		$new = $this->repo::update($id, $data, $this->validator::getFillable());

		// event tambahan
		$this->fireEvent('update', [
			'id' => $id,
			'new' => $new
		]);

		// commit transaksi
		DB::commit();

		return $new;
	}

	/**
	 * Menghapus data, tanpa response
	 * @param array $id
	 */
	public function delete($id)
	{
		// mulai transaksi
		DB::beginTransaction();

		foreach ($id as $v)
			$this->repo::delete($v);

		// event tambahan
		$this->fireEvent('delete', [
			'id' => $id
		]);

		// commit transaksi
		DB::commit();
	}

	/**
	 * Event tambahan
	 * @param string $event
	 * @param array $param
	 */
	protected function fireEvent($event, $param)
	{
		// lanjutkan chain jika ada
		$chained = Backend::continueChain();

		// mencegah infinite chain karena salah config
		if (!$chained and $this->chain) {
			if (!empty($param['new']))
				$data = $this->repo::getSecondaryData($param['new']->toArray());

			if ($event === 'create')
				Backend::chain($this->chain)->post($this->class, $data);
			else if ($event === 'update')
				Backend::chain($this->chain)->put($this->class . '/' . $param['id'], $data);
			else if ($event === 'delete')
				Backend::chain($this->chain)->delete($this->class, ['id' => $param['id']]);
		}
	}
}
