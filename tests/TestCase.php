<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */

    public $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMSIsImlkX3B0IjoxLCJpZF9yb2xlX3B0IjoxLCJpZF91bml0IjoxLCJleHAiOjE3NDI2MjQyNDV9.eX22dvOgmpYG12RmmrF1ZAxU4rfyFuG4a2GGnmJyFHg";


    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }
}
