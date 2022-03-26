<?php

namespace Siakad\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class MakeAllCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'make:all {table}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create classes of a database table';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$table = $this->argument('table');
		list(, $class) = explode('_', $table, 2);
		$class = ucfirst(Str::camel($class));

		// buat controller
		$path = base_path('app/Http/Controllers/V1/' . $class . 'Controller.php');
		if (!file_exists($path)) {
			$str = '<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class ' . $class . 'Controller extends Controller
{
}
';
			@file_put_contents($path, $str);
		}

		// buat service
		$path = base_path('app/Services/' . $class . 'Service.php');
		if (!file_exists($path)) {
			$str = '<?php

namespace App\Services;

use Siakad\Service;

class ' . $class . 'Service extends Service
{
}
';
			@file_put_contents($path, $str);
		}

		// buat repository
		$path = base_path('app/Repositories/' . $class . 'Repository.php');
		if (!file_exists($path)) {
			$str = '<?php

namespace App\Repositories;

use Siakad\Repository;

class ' . $class . 'Repository extends Repository
{
}
';
			@file_put_contents($path, $str);
		}

		// buat model
		$path = base_path('app/Models/' . $class . '.php');
		if (!file_exists($path)) {
			$str = '<?php

namespace App\Models;

use Siakad\Model;

class ' . $class . ' extends Model
{
	protected $table = \'' . $table . '\';
}
';
			@file_put_contents($path, $str);
		}

		// buat validator
		$path = base_path('app/Validators/' . $class . 'Validator.php');
		if (!file_exists($path)) {
			$str = '<?php

namespace App\Validators;

use Siakad\Validator;

class ' . $class . 'Validator extends Validator
{
}
';
			@file_put_contents($path, $str);
		}

		// buat schema (overwrite)
		$path = base_path('app/Schemas/' . $class . 'Schema.php');

		$str = '<?php

namespace App\Schemas;

use Siakad\Schema;

class ' . $class . 'Schema extends Schema
{
	protected static $fields = [';

		foreach (Schema::getConnection()->getDoctrineSchemaManager()->listTableColumns($table) as $v) {
			$type = $v->getType()->getName();

			$definition = [
				'\'type\' => \'' . $type . '\''
			];
			if (
				($type == 'string' and ($length = $v->getLength()) > 0)
				or ($type == 'decimal' and ($length = $v->getPrecision()) > 0)
			)
				$definition[] = '\'length\' => ' . $length;
			if (($length = $v->getScale()) > 0)
				$definition[] = '\'decimal\' => ' . $length;
			if ($v->getNotnull())
				$definition[] = '\'required\' => true';
			if (($default = $v->getDefault()) !== null)
				$definition[] = '\'default\' => \''.$default.'\'';

			$str .= '
		\'' . $v->getName() . '\' => [' . implode(', ', $definition) . '],';
		}

		$str .= '
	];
}
';
		@file_put_contents($path, $str);
	}
}
