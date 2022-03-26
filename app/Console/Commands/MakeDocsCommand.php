<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class MakeDocsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:docs {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create API documentation of a database table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $skip = [
            'created_at', 'created_by',
            'updated_at', 'updated_by', 'updated_ip', 'updated_path',
            'deleted_at', 'deleted_by'
        ];

        $table = $this->argument('table');
        list(, $class) = explode('_', $table, 2);
        $endpoint = str_replace("_", "-", $class);
        $name = str_replace("_", " ", $class);
        $class = ucfirst(Str::camel($class));

        $schema = [];
        $payload = [];
        $tableColumns = Schema::getConnection()->getDoctrineSchemaManager()->listTableColumns($table);
        foreach ($tableColumns as $v) {
            $field = $v->getName();
            if (in_array($field, $skip))
                continue;
            $value = "";
            if ($v->getDefault()) {
                $value = $v->getDefault();
            }
            $schema[] = ["field" => $field, "type" => $v->getType()->getName(), "value" => $value];
            if (in_array($field, ['id', 'id_pt', 'file_id', 'id_file_akta_kelahiran']))
                continue;
            $payload[] = ["field" => $field, "type" => $v->getType()->getName(), "value" => $value];
        };

        $path = base_path('app/Http/Controllers/V1/' . $class . 'Controller.php');
        if (!file_exists($path)) {
            $str = '<?php

namespace App\Http\Controllers\V1;

use Siakad\Controller;

class ' . $class . 'Controller extends Controller
{
    /**
     *
     * @OA\Get(
     *      path="/v1/' . $endpoint . '",
     *      tags={"' . ucfirst($name) . '"},
     *      summary="List ' . ucfirst($name) . '",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Get list of ' . $name .'.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",';
foreach ($schema as $v) {
    $str .= '
     *                      @OA\Property(property="' . $v['field'] . '", type="' . $v['type'] . '", example="' . $v['value'] . '"),';
}
$str .= '
     *                  ),
     *              ),
     *              @OA\Property(property="info", type="object",
     *                      @OA\Property(property="total", type="integer", example=10),
     *                      @OA\Property(property="page", type="integer", example=1),
     *                      @OA\Property(property="last_page", type="integer", example=1),
     *                      @OA\Property(property="count", type="integer", example=10),
     *                      @OA\Property(property="start", type="integer", example=1),
     *                      @OA\Property(property="end", type="integer", example=10),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select count(*) as aggregate from ' . $table . '"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *       ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/v1/' . $endpoint . '/{id}",
     *     summary="Data ' . ucfirst($name) . '",
     *     tags={"' . ucfirst($name) . '"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id ' . $name . '",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Get data of ' . $name . '.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",';
foreach ($schema as $v) {
    $str .= '
     *                      @OA\Property(property="' . $v['field'] . '", type="' . $v['type'] . '", example="' . $v['value'] . '"),';
}
$str .= '
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="SELECT * FROM ' . $table . ' WHERE ' . $table . '.id = 1 limit 1"),
     *                      @OA\Property(property="time", type="integer", example=59.0),
     *                  ),
     *              ),
     *          ),
     *     ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\' . $class . '] 1"),
     *                          @OA\Property(property="files", type="object",
     *                              @OA\Property(type="string", example="/Users/brondol/Applications/siakadcloud/master/vendor/illuminate/database/Eloquent/Builder.php baris 434"),
     *                          ),
     *                      ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select * from ak_mahasiswa where ak_mahasiswa.id = 1 limit 1"),
     *                      @OA\Property(property="time", type="integer", example=2.25),
     *                  ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     * @OA\Post(
     *     path="/v1/' . $endpoint . '",
     *     summary="Add ' . ucfirst($name) . '",
     *     tags={"' . ucfirst($name) . '"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(';
foreach ($payload as $v) {
    $str .= '
     *                 @OA\Property(property="' . $v['field'] . '", type="' . $v['type'] . '", example="' . $v['value'] . '"),';
}
$str .= '
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Success add new ' . $name .'.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",';
foreach ($schema as $v) {
    $str .= '
     *                      @OA\Property(property="' . $v['field'] . '", type="' . $v['type'] . '", example="' . $v['value'] . '"),';
}
$str .= '
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="insert into ' . $table . ' () values () returning id"),
     *                      @OA\Property(property="time", type="integer", example=8.13),
     *                  ),
     *              ),
     *          ),
     *     ),
     *     @OA\Response(response=400, description="Bad Request",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=400),
     *                      @OA\Property(property="message", type="string", example="Data yang dikirimkan tidak valid"),
     *                      @OA\Property(property="validation", type="object",
     *                          @OA\Property(property="nama_field", type="array",
     *                              @OA\Items(type="string", example="Harus diisi"),
     *                          ),
     *                      ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     * @OA\Put(
     *     path="/v1/' . $endpoint . '/{id}",
     *     summary="Update ' . $name . '",
     *     tags={"' . ucfirst($name) . '"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id ' . $name . '",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(';
foreach ($payload as $v) {
    $str .= '
     *                 @OA\Property(property="' . $v['field'] . '", type="' . $v['type'] . '", example="' . $v['value'] . '"),';
}
$str .= '
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Update ' . ucfirst($name) . '.",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object",';
foreach ($schema as $v) {
    $str .= '
     *                      @OA\Property(property="' . $v['field'] . '", type="' . $v['type'] . '", example="' . $v['value'] . '"),';
}
$str .= '
     *                  ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="update ' . $table . ' set ' . $table . '.id = 1 where ' . $table . '.id = 1"),
     *                      @OA\Property(property="time", type="integer", example=8.13),
     *                  ),
     *              ),
     *          ),
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\'. $class . '] 1"),
     *                          @OA\Property(property="files", type="object",
     *                              @OA\Property(type="string", example="/Users/brondol/Applications/siakadcloud/master/vendor/illuminate/database/Eloquent/Builder.php baris 434"),
     *                          ),
     *                      ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select * from ak_mahasiswa where ak_mahasiswa.id = 1 limit 1"),
     *                      @OA\Property(property="time", type="integer", example=2.25),
     *                  ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     * @OA\Delete(
     *     path="/v1/' . $endpoint . '/{id}",
     *     summary="Delete ' . $name . '",
     *     tags={"' . ucfirst($name) . '"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="id ' . $name . '",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Berhasil Menghapus ' . ucfirst($name) . '"
     *       ),
     *     @OA\Response(response=404, description="Error: Not Found",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(property="error", type="object",
     *                      @OA\Property(property="code", type="integer", example=404),
     *                      @OA\Property(property="message", type="string", example="Data tidak ditemukan"),
     *                      @OA\Property(property="debug", type="object",
     *                          @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\' . $class . '] 1"),
     *                          @OA\Property(property="files", type="object",
     *                              @OA\Property(type="string", example="/Users/brondol/Applications/siakadcloud/master/vendor/illuminate/database/Eloquent/Builder.php baris 434"),
     *                          ),
     *                      ),
     *              ),
     *              @OA\Property(property="debug", type="array",
     *                  @OA\Items(type="object",
     *                      @OA\Property(property="query", type="string", example="select * from ak_mahasiswa where ak_mahasiswa.id = 1 limit 1"),
     *                      @OA\Property(property="time", type="integer", example=2.25),
     *                  ),
     *              ),
     *          ),
     *     ),
     * )
     */

    /**
     *     @OA\Schema(
     *         schema="' . ucfirst($name) . '",
     *         @OA\Xml(name="' . ucfirst($name) . '"),';
foreach ($schema as $v) {
    $str .= '
     *         @OA\Property(property="' . $v['field'] . '", type="' . $v['type'] . '", example="' . $v['value'] . '"),';
}
$str .= '
     *     ),
     */
}
        ';
            @file_put_contents($path, $str);
        } else {
            $this->info($class . 'Documen already exist!');
        }
    }
}