<?php

namespace Eeyes\Common;

class EeyesCommon
{
    protected static $config = [];

    public static function config($name, $default = null)
    {
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                static::$config[$key] = $value;
            }
            return null;
        } else {
            return isset(static::$config[$name]) ? static::$config[$name] : $default;
        }
    }
}