<?php
/**
 * Created by PhpStorm.
 * User: ganlv
 * Date: 17-9-24
 * Time: 下午2:23
 */

namespace Eeyes\Common\Img;

class View extends Base
{
    public static function footer()
    {
        $response = static::client()->request('GET', '/eeyes_common/eeyes_common_footer.js');
        $js = $response->getBody();
        if (1 === preg_match('/document.write\((.*)\);/', $js, $matches)) {
            return json_decode($matches[1], true);
        }
        return null;
    }
}