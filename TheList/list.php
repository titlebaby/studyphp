<?php
/**
 * Created by PhpStorm.
 * User: linger
 * Date: 2019-10-13
 * Time: 17:26
 */

class Node
{
    public $data;
    public $next;
    public $listLength;


    public function __construct($val, $next, $listLength)
    {
        $this->data = $val;
        $this->next = $next;
        $this->listLength = $listLength;
    }

}

function createRing($n) {
    $i = 1;
    $ringFirst = new Node($i, null, $n);
    $preNode = $ringFirst;
    while($i < $n) {
        $i++;
        $oneNode = new Node($i, null, 0);
        $preNode->next = $oneNode;
        $preNode = $oneNode;
        // var_dump($i);
    }
    $preNode->next = $ringFirst;
    return $ringFirst;

}

function insertOneNodeWithM($startNode, $m, $insertNode) {
    $i = 1;
    $node = $startNode;
    while ($i < $m) {
        $node = $node->next;
        $i++;
    }
    $nextNode = $node->next;
    $node->next = $insertNode;
    $insertNode->next = $nextNode;
    return $insertNode;
}

function findShortLength($startNode, $findValue, $max) {
    $n = 0;
    $node = $startNode->next;
    while($node->data != $findValue) {
        $n++;
        $node = $node->next;
    }
    if ($n > $max/2) {
        return $max - $n;
    }
    return $n;
}

function showList($list, $length) {
    $i = 1;
    $oneNode = $list;
    $max = $oneNode->listLength;
    while($i <= $length) {
        var_dump($oneNode->data);
        $oneNode = $oneNode->next;
        $i++;
    }
}
$n = 5;
$m = 3;
$ring = createRing($n);
// showList($ring);
$i = 1;
$node = $ring;
$f = 'f';
while($i <= 5) {
    $node = insertOneNodeWithM($node, $m, new Node($f.$i, null, 1));
    $i++;
}
showList($ring, 10);
$ans = findShortLength($node, 1,2 * $n - 1);
var_dump($ans);


