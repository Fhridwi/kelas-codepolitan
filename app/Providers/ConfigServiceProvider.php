<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $config = [
            'app_name' => 'Kelas Codepolitan',
            'app_version' => '1.0.0',
            'app_author' => 'Codepolitan'
        ];

        View::share('config', $config);
    }
}
