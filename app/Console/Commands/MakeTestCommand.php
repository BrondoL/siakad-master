<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class MakeTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:test {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create unit test of a database table';

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
        $endpoint =str_replace("_", "-", $class);
        $class = ucfirst(Str::camel($class));

        $schema = [];
        $data = "";
        $tableColumns = Schema::getConnection()->getDoctrineSchemaManager()->listTableColumns($table);
        foreach ($tableColumns as $v) {
            $name = $v->getName();
            if (in_array($name, $skip))
                continue;
            $schema[] = $name;
            if (in_array($name, ['id', 'id_pt', 'file_id', 'id_file_akta_kelahiran']))
                continue;
            if ($v->getDefault()) {
                $value = $v->getDefault();
            } else {
                $value = $v->getType()->getName();
            }
            $data .= "'$name' => '$value',\n";
        };


        $path = base_path('tests/' . $class . 'Test.php');
        if (!file_exists($path)) {
            $str = '<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class ' . $class . 'Test extends TestCase
{
    private $' . strtolower($class) . 'Schema' . ' = ' . json_encode($schema) . ';
    private $payload = [
        ' . $data . '
    ];

    public function get_latest_id()
    {
        return DB::select("SELECT id FROM public.' . $table . ' ORDER BY id DESC")[0]->id;
    }

    // Validasi Request Method

    public function test_create_' . strtolower($class) . '()
    {
        $response = $this->json("POST", "v1/' . $endpoint . '", $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            "data" => $this->' . strtolower($class) . 'Schema' . ',
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    // Validasi PATH

    public function test_get_' . strtolower($class) . '()
    {
        $response = $this->json("GET", "v1/' . $endpoint . '", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->' . strtolower($class) . 'Schema' . '
            ],
            "info" => [
                "total",
                "page",
                "last_page",
                "count",
                "start",
                "end",
            ],
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_' . strtolower($class) . '_with_id()
    {
        $response = $this->json("GET", "v1/' . $endpoint . "/" . '" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->' . strtolower($class) . 'Schema' . ',
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_' . strtolower($class) . '_with_wrong_id()
    {
        $response = $this->json("GET", "v1/' . $endpoint . '/-1"' . ', [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_detail_' . strtolower($class) . '()
    {
        $response = $this->json("GET", "v1/' . $endpoint . '/1/detail"' . ', [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(404);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message"
            ],
        ]);
    }

    public function test_wrong_path_' . strtolower($class) . '()
    {
        $response = $this->json("GET", "v1/salah"' . ', [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(500);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message",
                "debug" => [
                    "message",
                    "files"
                ]
            ],
        ]);
    }

    // Validasi Request Method

    public function test_get_list_' . strtolower($class) . '()
    {
        $response = $this->json("GET", "v1/' . $endpoint . '", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => [
                "*" => $this->' . strtolower($class) . 'Schema' . '
            ],
            "info" => [
                "total",
                "page",
                "last_page",
                "count",
                "start",
                "end",
            ],
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_get_detail_' . strtolower($class) . '()
    {
        $response = $this->json("GET", "v1/' . $endpoint . "/" . '" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->' . strtolower($class) . 'Schema' . ',
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
    }

    public function test_update_' . strtolower($class) . '()
    {
        $response = $this->json("PUT", "v1/' . $endpoint . "/" . '" . $this->get_latest_id(), $this->payload, ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            "data" => $this->' . strtolower($class) . 'Schema' . ',
            "debug" => [
                "*" => [
                    "query",
                    "time"
                ]
            ]
        ]);
        $response->seeJson($this->payload);
    }

    public function test_delete_' . strtolower($class) . '()
    {
        $response = $this->json("DELETE", "v1/' . $endpoint . "/" . '" . $this->get_latest_id(), [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(200);
    }

    // Validasi Request Body

    public function test_post_without_body_' . strtolower($class) . '()
    {
        $response = $this->json("POST", "v1/' . $endpoint . '", [], ["HTTP_Authorization" => "Bearer " . $this->token]);
        $response->seeStatusCode(400);
        $response->seeJsonStructure([
            "error" => [
                "code",
                "message",
                "validation",
            ]
        ]);
    }
}
';
            @file_put_contents($path, $str);
        } else {
            $this->info($class . 'Test already exist!');
        }
    }
}
