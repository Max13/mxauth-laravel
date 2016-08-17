<?php

namespace MX;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/main.php', 'mxauth-laravel'
        );
    }

    public function boot()
    {
        require __DIR__ . '/routes.php';
    }
}
