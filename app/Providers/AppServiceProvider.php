<?php

// app/Providers/BladeServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register the Blade components.
     *
     * @return void 
     */
    public function boot()
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceSheme('https');
        }
    }

    public function register()
    {
        //
    }
}
