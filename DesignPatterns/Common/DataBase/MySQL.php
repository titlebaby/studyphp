<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 13:26
 */

namespace Common\DataBase;


use Common\IDataBase;

class MySQL implements IDataBase
{
    protected $conn;
    function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysql_connect($host,$user,$passwd);
        mysql_select_db($dbname,$conn);
        $this->conn = $conn;

    }
    function query($sql)
    {
        $res = mysql_query($sql,$this->conn);
        return  mysql_fetch_assoc($res);
    }
    function close()
    {
        mysql_close($this->conn);
    }
}