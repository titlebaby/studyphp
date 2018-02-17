<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 12:48
 */

namespace Common;

//工厂模式替换直接new 单独的对象
class Factory
{
    static function createDatabase(){
        $db= Database::getInstance();
        Register::set('db1', $db);
        return $db;
    }

}