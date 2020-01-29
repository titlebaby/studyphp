<?php
/**
 * Created by PhpStorm.
 * User: linger
 * Date: 2019-10-16
 * Time: 11:35
 */

//简单-全等
function trueOrFalse(){
    $str1 = null;
    $str2 = false;
    echo $str1==$str2 ? '相等' : '不相等';
    $str3 = '';
    $str4 = 0;
    echo $str3==$str4 ? '相等' : '不相等';
    $str5 = 0;
    $str6 = '0';
    echo $str5===$str6 ? '相等' : '不相等';

    //相等 相等 不相等
}

/**
 * 是不是empty判断
 */
function isEmptyOrTrue(){
    $a1 = null;
    $a2 = false;
    $a3 = 0;
    $a4 = '';
    $a5 = '0';//0字符串也为空【false】
    $a6 = 'null';//null字符串为非空 【true】
    $a7 = array();
    $a8 = array(array());//二位空数组为非空【false】
    echo empty($a1) ? 'true' : 'false';
    echo empty($a2) ? 'true' : 'false';
    echo empty($a3) ? 'true' : 'false';
    echo empty($a4) ? 'true' : 'false';
    var_dump( empty($a6));
    echo "<br/>";
    echo empty($a5) ? 'true' : 'false';
    echo empty($a6) ? 'true' : 'false';
    echo empty($a7) ? 'true' : 'false';
    echo empty($a8) ? 'true' : 'false';

}

function addrReference(){
    $test = 'aaaaaa';
    $abc = &$test;
    unset($test);
   //unset 只会销毁变量，不会释放其内存
    // $test = null; 这样才会释放内存
    echo $abc;//aaaaaa
}

/**
 * 静态变量，
 * 1.存储在静态存储区，程序运行期间都不释放内存，值始终保持最新
 * 2.但是作用于作用域之内，之外不能使用
 */
function getStaticVar(){
    $count = 5;
    function get_count(){
        //函数内静态变量，只作用于函数，同一进程内（存在静态存储区，存在这里程序整个运行期间都不释放），
        //每调用一次函数，静态变量（函数的调用退出）累计不会改变
        //----普通函数内变量---
        //而auto自动变量，即动态局部变量，属于动态存储类别，
        //占动态存储空间，函数调用结束后即释放
        static $count = 0;
        return  $count++;//501
        return ++$count;// 512
    }
    echo $count;
    ++$count;
    echo get_count();
    echo get_count();
}


function getGlobals(){
    $GLOBALS['var1'] = 5;
    $var2 = 7;
    function get_value(){
        global $var2;
        $var1 = 0;
        return $var2++;
    }
    get_value();
    var_dump($var1); //null
    echo $var2; //7
}
//getGlobals();

function getUnset(){
    function get_arr(&$arr){
        unset($arr[0]);
    }
    $arr1 = array(1, 2);
    $arr2 = array(1, 2);
    get_arr($arr1);//1
   // get_arr($arr2);//2
    echo count($arr1);
    echo count($arr2);
}
//getUnset();


