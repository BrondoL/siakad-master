<?php

namespace App\Providers;

use Siakad\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        if(Response::isDebug()) {
            DB::listen(function ($query) {
                $debug = app('request')->request->get('debug');

                $sql = str_replace(['?', '"'], ['\'%s\'', ''], $query->sql);
                $sql = preg_replace(['/\s+/', '/\s([?.!])/'], [' ','$1'], $sql);
                $sql = vsprintf($sql, $query->bindings);

                $debug[] = [
                    'query' => $sql,
                    'time' => $query->time
                ];
                
                app('request')->request->set('debug', $debug);
            });
        }
    }
}
