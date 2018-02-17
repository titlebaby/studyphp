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
$db = new Common\Database\MySQLi();
$db->connect('127.0.0.1', 'root', '', 'test_demo');
$res = $db->query("select * from users limit 3");
var_dump($res);
$db->close();

//=== 策略模式
//1.是将一组特定的行为和算法封装成类，以适应某种特定的上下文环境，这种环境就是策略模式
//2.实际应用举例，如一个电商网站系统，针对男性女性用户要各自跳转到不同的商品类目，并且所有广告位展示不同的广告
class Page
{
    protected $strategy;

    function index()
    {
        $this->strategy->showAd();
        echo "<br/>";
        $this->strategy->showCategory();
        //传统
//        if(isset($_GET['female'])){
//
//        } else {
//
//        }
    }

    function setStrategy(\Common\UserStrategy $strategy)
    {
        $this->strategy = $strategy;

    }
}

$page = new Page();
//策略的解耦
if(isset($_GET['female'])){
    $strategy = new \Common\FemaleUserStrategy();
} else{
    $strategy = new \Common\MaleUserStrategy();
}
//这个对象 $strategy 必须是实现接口的类 setStrategy 指定入参类型
$page->setStrategy($strategy);
$page ->index();
//3.策略模式可以实现IOC，依赖倒置、控制反转 Page依赖MaleUserStrategy 等类，通过策略模式，使用分支逻辑的处理——策略解耦，依赖关系进行反转

//===数据对象映射模式
$user = new \Common\User(1);
//var_dump($user->name);

$user->email='2323@qq.com';
$user->name='test';
$user->updated_at= date("Y-m-d H:i:s");

//=== 观察者模式 (Observer)
// 1.当一个对象状态发生改变时，依赖它的对象全部会受到通知，并自动更新
// 2. 场景：一个时间发生后，要执行一连串更新操作，传统的编程方法，就是在时间的代码之后直接加入处理逻辑。当更新的逻辑增加多之后，代码会变得难以维护。
// 这中方式是耦合的，侵入式的，增加新的逻辑需要修改事件主体的代码
//3.观察者模式实现了低耦合，非侵入式的通知和更新机制
echo "<br/><br/>观察者模式<br/>";

class Event extends Common\EventGenerator{
    //继承与被观察者基类
    function trigger(){
        echo "Event <br/> \n";
        //1 2 不同的业务逻辑模块
        //更新逻辑 1
        $this->notify();
        //更新逻辑2
    }
}
class Observer1 implements Common\Observer{
    function update($event_info = null)
    {
        echo "逻辑1 observer1";
        // TODO: Implement update() method.
    }
}

class Observer2 implements Common\Observer{
    function update($event_info = null)
    {
        echo "逻辑2 observer2";
        // TODO: Implement update() method.
    }
}
$event = new Event;
//观察者添加到监听列表中 预先先注册好 触发事件后 的逻辑1，2，3...最后统一通知已经注册的（更新操作）观察者
$event->addObserver(new Observer1());
echo "<br/>";
$event->addObserver(new Observer2());
$event->trigger();


echo "<br/><br/>原型模式<br/>";
//===原型模式
//1.与工厂模式作用类似，都是用来创建对象
//2.与工厂模式的实现不同，原型模式是先创建好一个原型对象，然后通过clone原型对象来创建新的对象。这样就免去了类创建时重复的初始化操作
//3.原型模式适用于大对象的创建。创建一个大对象需要很大的开销，如果每次new就会消耗很大，原型模式仅需内存拷贝即可










