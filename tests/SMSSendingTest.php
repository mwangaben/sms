<?php

namespace Mwangaben\SMS\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Mwangaben\SMS\SMSApi;

class SMSSendingTest extends TestCase
{
    use WithFaker;

    /** @test * */
    public function it_make_request()
    {
        Http::fake(['https://sms.smarticom.co.tz/*' => Http::response($this->response(), 200)]);

        $res = SMSApi::send('0717031351', 'Hello There');


        $this->assertTrue(SMSApi::sent($res));

    }


    /**
     * @return array
     */
    protected function response(): array
    {
        return [
            "status"  => "success",
            "message" => "Your message was successfully Submitted",
            "data"    => [
                "uid"     => "64e7157ba4240",
                "to"      => "255717031351",
                "from"    => "SLES",
                "message" => "Hello It works",
                "status"  => "Submitted",
                "cost"    => "1"
            ]
        ];
    }
}