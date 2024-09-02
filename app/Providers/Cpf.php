<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Cpf extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public static function isValid($cpf) {
        return preg_match('/^\d{11}$/', $cpf);
    }
}
