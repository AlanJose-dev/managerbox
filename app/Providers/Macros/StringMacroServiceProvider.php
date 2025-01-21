<?php

namespace App\Providers\Macros;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class StringMacroServiceProvider extends ServiceProvider
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
        Str::macro('unformattedPhoneNumber', function(string $phoneNumber) {
            return preg_replace('/\D/', '', $phoneNumber);
        });
    }
}
