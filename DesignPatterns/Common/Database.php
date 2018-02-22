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
    protected static $conn;
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

    static function connect(){
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'test_demo');
        self::$conn = $conn;
        return self::$conn;
    }

    static function query($sql)
    {
        $res = mysqli_query(self::$conn,$sql);
        return $res;
//        return mysqli_fetch_all($res,MYSQLI_ASSOC);
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