<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 0:10
 */

namespace Common;


class Loader
{
    static function autoload($class){
        require  BASEDIR.'/'.$class.'.php';
//        require BASEDIR.'/'.str_replace('\\','/', $class).'.php';
    }

}