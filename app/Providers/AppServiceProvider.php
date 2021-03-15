<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);

        if (class_exists('Swift_Preferences')) {
            \Swift_Preferences::getInstance()->setTempDir('/var/www/tmp');
        } else {
            \Log::warning('Class Swift_Preferences does not exists');
        }

    }
}
