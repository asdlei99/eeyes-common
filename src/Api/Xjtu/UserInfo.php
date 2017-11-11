<?php

namespace Eeyes\Common\Api\Xjtu;

use Eeyes\Common\Api\Base;
use GuzzleHttp\Exception\GuzzleException;

class UserInfo extends Base
{
    protected static function getBy($field, $value)
    {
        if (!in_array($field, ['net_id', 'stu_id', 'name', 'mobile'])) {
            throw new \Exception("Field {$field} not allow.");
        }
        try {
            $response = static::client()->request('GET', '/xjtu/user/info', [
                'query' => [
                    $field => $value,
                    'token' => static::getApiToken(),
                ],
            ]);
        } catch (GuzzleException $e) {
            return null;
        }
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $result = json_decode($response->getBody(), true);
        if ($result['code'] !== 200) {
            return null;
        } else {
            return $result['data'];
        }
    }

    public static function getByNetId($net_id)
    {
        return static::getBy('net_id', $net_id);
    }

    public static function getByStuId($stu_id)
    {
        return static::getBy('stu_id', $stu_id);
    }

    public static function getByName($name)
    {
        return static::getBy('name', $name);
    }

    public static function getByMobile($mobile)
    {
        return static::getBy('mobile', $mobile);
    }
}
