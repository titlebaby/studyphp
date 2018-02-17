<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 11:41
 */

namespace Common;

interface IDataBase{
    function connect($host,$user,$passwd,$dbname);
    function query($sql);
    function close();
}

class Database
{
    //必须是保护或私有
    protected static $db;
    private function __construct()
    {
    }
    static function getInstance(){
        if(self::$db){
            return self::$db;
        } else{
            self::$db =new self();
            return self::$db;
        }
    }

    function  where($where){
        return $this;
    }
    function order($order){
        return $this;
    }
    function limit($limit){
        return $this;

    }

}