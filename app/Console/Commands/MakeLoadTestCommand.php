<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class MakeLoadTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:loadtest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create performance test of a database table';

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
        $path = base_path('performance/LoadTest.js');
        if (!file_exists($path)) {
            $skip = ['sc_token', 'migrations'];
            $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();

            $str =
            '
import http from "k6/http";
import { check, group, sleep } from "k6";
import { token } from "./constant.js";

export const options = {
    vus: 10,
    duration: "60s",
    discardResponseBodies: true,
};
const SLEEP_DURATION = 1;

export default function () {
    const params = {
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
        },
        tags: {
            name: "",
        },
    };

    group("siakad journey", (_) => {';

            foreach($tables as $table){
                if (in_array($table, $skip))
                    continue;
                list(, $class) = explode('_', $table, 2);
                $endpoint = str_replace("_", "-", $class);
                $name = str_replace("_", " ", $class);
                $str .= '

        // LIST ' . strtoupper($name) . '
        params.tags.name = "List ' . $name . '";
        const get_' . $class . '_response = http.get(
            "https://master.brondol.works/v1/' . $endpoint . '",
            params
        );
        check(get_' . $class . '_response, {
            "List ' . $name . ' status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);';
            }

            $str .=
            '
    });
}';
            @file_put_contents($path, $str);
        } else {
            $this->info('Test already exist!');
        }
    }
}
