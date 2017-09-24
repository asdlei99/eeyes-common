<?php

namespace Eeyes\Common\Api;

use Eeyes\Common\EeyesCommon;
use GuzzleHttp\Client;

class Base extends EeyesCommon
{
    /**
     * @return \GuzzleHttp\Client
     */
    public static function client()
    {
        $client = new Client([
            'base_uri' => static::config('API_URL'),
            'timeout' => 10,
        ]);
        return $client;
    }

    public static function getApiToken()
    {
        $api_token = static::config('API_TOKEN');
        if (!$api_token) {
            throw new \Exception('API_TOKEN should be set.');
        }
        return $api_token;
    }
}