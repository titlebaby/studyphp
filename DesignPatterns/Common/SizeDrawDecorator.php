<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 17:53
 */

namespace Common;


class SizeDrawDecorator implements DrawDecorator
{
    protected $size ;

    function __construct($size='14px')
    {
        $this->size = $size;
    }

    function beforeDraw()
    {
        echo "<div style='width:{$this->size}'>";
        // TODO: Implement beforeDraw() method.
    }

    function afterDraw()
    {
        echo "</div>";
        // TODO: Implement afterDraw() method.
    }
}