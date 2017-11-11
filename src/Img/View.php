<?php
/**
 * Created by PhpStorm.
 * User: ganlv
 * Date: 17-9-24
 * Time: 下午2:23
 */

namespace Eeyes\Common\Img;

use GuzzleHttp\Exception\GuzzleException;

class View extends Base
{
    public static function footer()
    {
        try {
            $response = static::client()->request('GET', '/eeyes_common/eeyes_common_footer.js');
        } catch (GuzzleException $e) {
            return null;
        }
        $js = $response->getBody();
        if (1 === preg_match('/document.write\((.*)\);/', $js, $matches)) {
            return json_decode($matches[1], true);
        }
        return null;
    }
}
