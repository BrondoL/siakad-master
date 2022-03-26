<?php

namespace Siakad;

use Illuminate\Database\Schema\Blueprint as BlueprintBase;

class Blueprint extends BlueprintBase
{
	/**
	 * Serial (autoincrement) integer
	 * @param string $column
	 * @return \Illuminate\Database\Schema\ColumnDefinition
	 */
	public function serial($column = 'id')
	{
		return $this->increments($column);
	}

	/**
	 * Tipe data flag
	 * @param string $column
	 * @param mixed $default
	 * @return \Illuminate\Database\Schema\ColumnDefinition
	 */
	public function flag($column, $default = null)
	{
		$col = $this->char($column, 1);
		if (isset($default))
			$col->default($default ? '1' : '0');

		return $col;
	}

	/**
	 * Tambahkan kolom log
	 * @param boolean $softdelete
	 */
	public function log($softdelete = false)
	{
		$this->timestampTz('created_at')->nullable()->useCurrent();
		$this->integer('created_by')->nullable();
		$this->timestampTz('updated_at')->nullable();
		$this->integer('updated_by')->nullable();
		$this->ipAddress('updated_ip')->nullable();
		$this->string('updated_path', 50)->nullable();

		if ($softdelete) {
			$this->timestampTz('deleted_at')->nullable();
			$this->integer('deleted_by')->nullable();
		}
	}

	/**
	 * Default foreign key
	 * @param string $column
	 */
	public function fk($column = 'id')
	{
		return $this->foreign($column)->references('id')->onUpdate('restrict')->onDelete('restrict');
	}
}
