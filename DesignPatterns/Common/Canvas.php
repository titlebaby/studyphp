<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 17:06
 */

namespace Common;


class Canvas
{
    public $data;
    public $decorators = [];

    function init($width = 20, $height = 10)
    {
        $data = [];
        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $data[$i][$j] = '*';

            }
        }
        $this->data = $data;

    }

    //动态添加装饰器
    function addDecorator(DrawDecorator $decorator)
    {
        $this->decorators[] = $decorator;

    }

    function beforeDraw()
    {
        foreach ($this->decorators as $decorator) {
            $decorator->beforeDraw();
        }

    }

    function afterDraw()
    {
        //装饰器需要进行一个反转 after需要后进先出
        $decorators = array_reverse($this->decorators);
        foreach ($decorators as $decorator) {
            $decorator->afterDraw();
        }

    }

    function draw()
    {
        $this->beforeDraw();
        foreach ($this->data as $lines) {
            foreach ($lines as $char) {
                echo $char;
            }
            echo "<br/>\n";
        }
        $this->afterDraw();
    }

    function rect($a1, $a2, $b1, $b2)
    {
        foreach ($this->data as $k1 => $line) {
            if ($k1 < $a1 or $k1 > $a2) continue;
            foreach ($line as $k2 => $char) {
                if ($k2 < $b1 or $k2 > $b2) continue;
                $this->data[$k1][$k2] = "&nbsp;";

            }

        }
    }

}