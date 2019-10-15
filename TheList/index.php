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


    public function __construct($val, $next)
    {
        $this->data = $val;
        $this->next = $next;
    }

}

/**
 * TODO:构建单链表
 */
Class SingleLinkList
{

    /*    头插法创建链表 n为节点总数    */
    public function headInsert($n)
    {
        /*    新建一个头节点    */
        $head = new Node(null, null);
        for ($i = $n; $i > 0; $i--) {
            $newNode       = new Node($i, null);
            $head->data    = $newNode->data;    #新建节点赋值给头节点
            $newNode->next = $head->next;    #将头节点的后继节点作为新建节点的后继节点，相当于在原头节点和头节点的后继节点中间添加了一个新节点
            $head->next    = $newNode;            #将新建节点作为头节点的后继节点，这时候原本头节点的后继节点已经改变了
        }
        return $head;
    }


    public function rearInsert($n)
    {
        //新建头尾节点，指向同一个节点
        $head = $tail = new Node(null, null);
        for ($j = 1; $j <= $n; $j++) {
            $newNode    = new Node($j, null);
            $tail->data = $newNode->data;
            //将尾结点指针指向新的节点
            $tail->next = $newNode;
            //将新节点标记为尾结点
            $tail = $newNode;
        }
        return $head;
    }

    public function createRing($n)
    {
        $head = new Node($n, null);
        for ($i = 1; $i < $n; $i++) {
            $temp = $head;
            if ($i == 1) {
                $newNode       = new Node($i, null);
                $newNode->next = $head;
                $temp->next    = $newNode;
                //$temp          = $newNode;
            } else {
                $newNode       = new Node($i, null);
                $newNode->next = $temp->next;
                $temp->next = $newNode;

            }
        }
        return $head;

    }

    public function insertRing($list){
        $temp = $list;
        $newNode       = new Node(rand(10,30), null);
        $newNode->next = $temp->next;
        $temp->next = $newNode;
        return $list;
    }


    public function setOne($list, $m, $n)
    {
        //var_dump($list);
        $fm = $n;
        $tmp   = 1;
        $count = 0;//记录已经插入的数量
        while ($list->next != null) {

            if ($count == $n) {
                //标注小猴
                $small = $list->data;
                break;
            }
            if ($tmp == $m) {//第m个
               // var_dump($list->data);
                $fm += 1;
               // $tmpVal        = $list->data;
                $newNode       = new Node("F".$fm, null);
                $newNode->next = $list->next;
                //$newNode->data = $tmpVal;
                $list->next    = $newNode;
                $tmp           = 1;
                $count++;
                //var_dump("COUNT=".$count);
                $list = $list->next;
               // if($count==2) {
                   // var_dump($list->data);
               // }
                continue;
                var_dump(123);
            }

            $list = $list->next;
            $tmp++;
        }
        return [$list,$small];

        var_dump($small);
        $distance = 0;
        while ($small && $small->next) {
            var_dump(123);
            if ($small->data == $big->data) {
                var_dump($small->next);
                var_dump($big->next);
                break;
            }
            $distance++;
            $small = $small->next;
        }
        return $distance;

    }

    function findShortest($list,$big,$small,$total){
        //从找到大猴开始计数，知道找到小猴，然后再换城最小位置
        $n = false;
        while ($list->next != null ){
            if($list->data == $big) {
                $n=1;
                $list = $list->next;
                continue;
            }
            if ($n !== false) {
                $n++;
            }
            if($n>1 && $list->data == $small) {
                break;
            }
            $list = $list->next;
        }
        if(($n-2) < ($total-2)/2){
            return $n-2;
        } else {
            return $total-$n;
        }

    }

}

$link = new SingleLinkList();
$list = $link->createRing(5);
$big = $list->data;
list($list,$small) = $link->setOne($list, 3, 5);
$n = $link->findShortest($list,$big,$small, 5*2);
var_dump($n);
