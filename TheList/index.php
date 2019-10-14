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
        $big   = $list->next;//标注大猴
        while ($list->next != null) {

            if ($count == $n) {
                //标注小猴
                $small = $list;
                break;
            }
            if ($tmp == $m) {//第m个
                $fm += 1;
               // $tmpVal        = $list->data;
                $newNode       = new Node("F".$fm, null);
                $newNode->next = $list->next;
                //$newNode->data = $tmpVal;
                $list->next    = $newNode;
                $tmp           = 1;
                $count++;
                var_dump("COUNT=".$count);
                //$list = $list->next;
               // var_dump($list->data);die();
                continue;
            }
            $list = $list->next;
            $tmp++;
           // var_dump("tmp=".$tmp);
        }

        $e = 1;
        while ($list->next != null) {

            //var_dump($e);
            var_dump("------------".$list->data);
            if ($e > 7) {
                break;
            }
            $list = $list->next;
            $e++;
        }
        die();
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

}

$link = new SingleLinkList();
$list = $link->createRing(5);
//$e    = 1;
//while ($list->next != null) {
//
//    //var_dump($e);
//    var_dump($list->data);
//    if ($e > 7) {
//        break;
//    }
//    $list = $list->next;
//    $e++;
//}
//die();
$res = $link->setOne($list, 2, 5);

var_dump($res);