<?php

namespace Eeyes\Common\Api\Eeyes;

use Eeyes\Common\Api\Base;
use GuzzleHttp\Exception\GuzzleException;

class Notification extends Base
{
    public static function dingTalk($content)
    {
        try {
            $response = static::client()->request('POST', '/eeyes/notification/ding_talk', [
                'query' => [
                    'token' => static::getApiToken(),
                ],
                'json' => [
                    'content' => $content,
                ],
            ]);
        } catch (GuzzleException $e) {
            return false;
        }
        if ($response->getStatusCode() !== 200) {
            return false;
        }
        $result = json_decode($response->getBody(), true);
        if ($result['code'] !== 200) {
            return false;
        } else {
            return true;
        }
    }
}
