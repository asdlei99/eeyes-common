<?php

namespace Eeyes\Common\Api\Xjtu;

use Eeyes\Common\Api\Base;

class UserInfo extends Base
{
    protected static function getBy($field, $value)
    {
        if (in_array($field, ['net_id', 'stu_id', 'name', 'mobile'])) {
            throw new \Exception("Field {$field} not allow.");
        }
        $response = static::client()->request('GET', '/xjtu/user/info', [
            'query' => [
                $field => $value,
                'token' => static::getApiToken(),
            ],
        ]);
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        if ($response['code'] !== 200) {
            return null;
        } else {
            return $response['data'];
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