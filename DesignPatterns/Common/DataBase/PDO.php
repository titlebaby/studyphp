<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 13:27
 */

namespace Common\DataBase;


use Common\IDataBase;

class PDO implements  IDataBase
{
    protected $conn;
    function connect($host, $user, $passwd, $dbname)
    {
        $conn = new \PDO("mysql:host=$host;dbname=$dbname",$user,$passwd);
        $this->conn = $conn;
    }
    function query($sql)
    {
        return $this->conn->query($sql);
    }
    function close()
    {
        unset($this->conn);
        // TODO: Implement close() method.
    }

}