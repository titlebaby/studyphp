<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 11:15
 */

//固定结构的数组 固定尺寸数组的 不管有没有使用 都会分配空间
$array = new SplFixedArray(10);
$array[0]=1234;
$array[9] =123;
var_dump($array);

//堆 数据接口 相对树数据结构
$heap = new SplMinHeap();
$heap->insert('data1 \n');
$heap->insert('data2 \n');
echo $heap->extract();
echo $heap->extract();

echo "<br>";
//队列数据接口 先进先出
$queue = new SplQueue();
$queue->enqueue('data1\n');
$queue->enqueue('data2\n');
echo $queue->dequeue();
echo $queue->dequeue();
echo "<br>";
//栈的数据接口 先进后出
$stack = new SplStack();
$stack->push('data1');
$stack->push('data2');
echo $stack->pop();
echo $stack->pop();


