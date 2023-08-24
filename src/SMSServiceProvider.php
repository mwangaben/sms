<?php

namespace Mwangaben\SMS;

use Illuminate\Support\ServiceProvider;

class SMSServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/smsapi.php' => config_path('smsapi.php')
        ]);
    }


    public function register()
    {
        $this->app->singleton(SMSApi::class, function () {
            return new SMSApi();
        });
    }

}
