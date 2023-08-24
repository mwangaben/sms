<?php

namespace Mwangaben\SMS\Tests;

use Mwangaben\SMS\SMSServiceProvider;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Contracts\Config\Repository as ConfigRepository;

abstract class TestCase extends Orchestra
{
    use WithWorkbench;


    public function getPackageProviders($app): array
    {
        return [
            SMSServiceProvider::class
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $config = $app->make(ConfigRepository::class);
        $config->set('smsapi', [
            'url'       => 'https://sms.smarticom.co.tz/api/v3/',
            'sender_id' => "SLES",
            'key'       => '16|YOz0r9YPw7acPTn8qZ98CJ2q7cYRaJJ03AhX44CU '
        ]);
    }
}