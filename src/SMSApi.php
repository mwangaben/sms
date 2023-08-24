<?php

namespace Mwangaben\SMS;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SMSApi
{


    /**
     * @param $phoneNumber
     * @param $message
     * @return PromiseInterface|Response
     */
    public static function send($phoneNumber, $message): PromiseInterface|Response
    {
        return Http::withToken(config('smsapi.key'))
            ->post(config('smsapi.url'), [
                "recipient" => $phoneNumber,
                "sender_id" => config('smsapi.id'),
                "message"   => $message
            ]);
    }
}
