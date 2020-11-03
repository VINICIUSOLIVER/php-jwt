<?php

namespace ViniciusOliveira\PhpJwt\Provider;

use Illuminate\Support\ServiceProvider;

class JWTServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../Database/Migrations/*" => base_path("database/migrations/")
        ], 'jwt-php');
    }
    /**
     *
     */
    public function register()
    {
        parent::register();
    }
}
