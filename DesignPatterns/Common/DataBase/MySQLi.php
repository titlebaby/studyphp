<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 13:27
 */

namespace Common\DataBase;


use Common\IDataBase;

class MySQLi implements IDataBase
{
    protected $conn;
    function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysqli_connect($host,$user,$passwd,$dbname);
        $this->conn = $conn;
    }
    function query($sql)
    {
        $res = mysqli_query($this->conn,$sql);
        return $res;
    }
    function close()
    {
        mysqli_close($this->conn);
    }
}