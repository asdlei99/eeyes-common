<?php

namespace Eeyes\Common\Img;

use Eeyes\Common\EeyesCommon;
use GuzzleHttp\Client;

class Base extends EeyesCommon
{
    /**
     * @return \GuzzleHttp\Client
     */
    public static function client()
    {
        $config = [
            'base_uri' => static::config('IMG_URL'),
            'timeout' => 10,
        ];
        $config = array_merge($config, static::config('GUZZLE_HTTP_CONFIG', []));
        $client = new Client($config);
        return $client;
    }
}