<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 17:35
 */

namespace Common;


interface DrawDecorator
{
    function beforeDraw();

    function afterDraw();
}