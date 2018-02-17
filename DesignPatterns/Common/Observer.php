<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 16:11
 */

namespace Common;

//观察者 观察事件发生者
interface Observer
{
    function update($event_info = null);

}