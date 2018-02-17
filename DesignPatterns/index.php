<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/16
 * Time: 19:53
 */
define('BASEDIR', __DIR__);
//自动加载 在php5.2 __autoload 已经废除 因为项目大了，就会出现重复定义
// 使用spl_autoload_register() 代替 可以重复注册 加载类去包含方法
include BASEDIR . '/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');
//=== 命令空间
//Common\ObjectNew::test();
//App\Controller\Home\Index::test();
//==链式操作 实现最关键的是 每个方法返回他本身 $this
/*$db = new Common\Database();
$db->where('id=1')->where('name=2')->order('id desc')->limit(10);*/

//==魔术方法
/*
 * $object = new \Common\ObjectNew();
$object->title = 'hello';
echo $object->title;
$object->test1('hello',123);
Common\ObjectNew::test2('__callstatic','123');
//直接echo 对象时就会调用__toString
echo $object;
//一个对象 当成一个函数去执行的时候 就会调用__invoke()
echo $object();
*/
//===工厂模式 替换掉 new Database();
$db = Common\Factory::createDatabase();

//===单例模式 将__construct 设置为私有，只有类本身能new ,屏蔽了其他地方直接创建对象（数据库连接对象）
//确定无论调用多少次 都是会new一次 到数据库的连接也只有一次
$db = Common\Database::getInstance();

//===注册树模式   取代直接去new Factory或者是获取单列 （类）
//已经创建好对象, 直接能取对象 （IOC）
$db = Common\Register::get('db1');
//var_dump($db);

//===适配器模式  就是提前定义好interface接口 所有相似的类都必须遵循这个规定实现这个接口的方法（契约），要搭上这个接口就必须按约定完成契约
//1.是将截然不同的函数接口封装成同一的API
//2.实际应用举例，PHP的数据库操作有mysql,mysqli,dbo3种，可以用适配器模式统一成一致。类似的场景还有cache适配器，memcahe,redis,file,apc等不同的缓存函数，统一成一致
$db = new Common\Database\MySQL();
$db->connect('127.0.0.1','root','','test');
$res = $db->query("show databases");
//var_dump($res);
$db->close();

//=== 策略模式
//1.是将一组特定的行为和算法封装成类，以适应某种特定的上下文环境，这种环境就是策略模式
//2.实际应用举例，如一个电商网站系统，针对男性女性用户要各自跳转到不同的商品类目，并且所有广告位展示不同的广告











