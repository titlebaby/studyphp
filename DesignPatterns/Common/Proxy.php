<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/22
 * Time: 22:18
 */

namespace Common;


class Proxy implements IUserProxy
{

    function getUserName($id)
    {
       $db = Factory::getDatabase('slave');
       $db->query();
    }

    function setUserName($id, $name)
    {
        $db = Factory::getDatabase('master');

    }
}