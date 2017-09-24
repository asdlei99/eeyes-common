<?php

namespace Eeyes\Common\Api\Eeyes;

use Eeyes\Common\Api\Base;

class Permission extends Base
{
    /**
     * 判断某CAS用户是否具有某权限
     *
     * @param string $username 用户名(NetId)
     * @param string $permission 权限代号
     *
     * @return array|null ['can' => mixed, 'msg' => string]
     * @throws \Exception
     */
    public static function username($username, $permission)
    {
        $response = static::client()->request('GET', '/eeyes/permission/username', [
            'query' => [
                'username' => $username,
                'permission' => $permission,
            ],
        ]);
        if ($response->getStatusCode() !== 200) {
            return [
                'can' => false,
                'msg' => $response->getReasonPhrase(),
            ];
        }
        $result = json_decode($response->getBody(), true);
        if ($result['code'] !== 200) {
            return [
                'can' => false,
                'msg' => isset($result['msg']) ? $result['msg'] : 'Unknown error',
            ];
        } else {
            return $result['data'];
        }
    }

    /**
     * 判断某令牌是否具有某权限
     *
     * @param string $token 令牌
     * @param string $permission 权限代号
     *
     * @return array|null ['can' => mixed, 'msg' => string]
     * @throws \Exception
     */
    public static function token($token, $permission)
    {
        $response = static::client()->request('GET', '/eeyes/permission/token', [
            'query' => [
                'token' => $token,
                'permission' => $permission,
            ],
        ]);
        if ($response->getStatusCode() !== 200) {
            return [
                'can' => false,
                'msg' => $response->getReasonPhrase(),
            ];
        }
        $result = json_decode($response->getBody(), true);
        if ($result['code'] !== 200) {
            return [
                'can' => false,
                'msg' => isset($result['msg']) ? $result['msg'] : 'Unknown error',
            ];
        } else {
            return $result['data'];
        }
    }
}
