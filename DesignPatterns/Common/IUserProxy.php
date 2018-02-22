<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/22
 * Time: 22:19
 */

namespace Common;


interface IUserProxy
{
    function getUserName($id);
    function setUserName($id,$name);

}