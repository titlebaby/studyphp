<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 13:04
 */

namespace Common;

// 注册树模式是将一些对象注册到全局的树上,可以在任务一个地址访问
class Register
{
    protected static $objects;

    //将一个对象注册到全局树上,与(映射的)别名绑定(key-value)
    static function set($alias, $object)
    {
        self::$objects[$alias] = $object;

    }

    static function get($alias)
    {
        return self::$objects[$alias];
    }

    function __unset($alias)
    {
        unset(self::$objects[$alias]);

    }

}