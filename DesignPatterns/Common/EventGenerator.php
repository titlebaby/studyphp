<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 16:08
 */

namespace Common;

//事件产生者
abstract class EventGenerator
{
    protected $observers = [];
    function addObserver(Observer $observer){
        $this->observers[]= $observer;
    }
    function notify(){
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }

}