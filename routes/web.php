<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Siakad\Route;

// definisi versi controller
$rver = new Route($router);

// token service
$router->group(['middleware' => 'auth.service'], function () use ($rver) {
    $rver->getSchema();
    $rver->post('unit/cache');
});

// token role
$router->group(['middleware' => 'auth.role'], function () use ($rver) {
    $rver->post('token/invalidate');
    $rver->getSelect();
    $rver->default();
});
