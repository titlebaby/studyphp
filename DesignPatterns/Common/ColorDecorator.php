<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 17:48
 */

namespace Common;


class ColorDecorator implements DrawDecorator
{
    protected $color;
    function __construct($color='red')
    {
        $this->color = $color;
    }

    function beforeDraw()
    {
        echo "<div style='color:{$this->color}'>";
    }

    function afterDraw()
    {
        echo "</div>";
    }
}