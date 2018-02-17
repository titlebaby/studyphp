<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 0:03
 */

namespace Common;


class ObjectNew
{
    protected $array = array();

    function __set($key, $value)
    {
        $this->array[$key] = $value;
    }

    function __get($key)
    {
        return $this->array[$key];
    }

    function  __call($func,$param){
        var_dump($func,$param);
        return "magic call";
    }
    //
    function __toString()
    {
        return __CLASS__;
    }
    function __invoke($param)
    {
        var_dump($param);
        // TODO: Implement __invoke() method.
    }

    static function __callStatic($func,$param){
        var_dump('__callStatic');
        var_dump($func,$param);

    }


    static function test()
    {
        echo __FILE__ . "<br>";
    }


}