<?php
/**
 * Created by PhpStorm.
 * User: linger
 * Date: 2020-01-29
 * Time: 17:28
 */


## 处理流程【发送消息时候，队列是不存在的，启动消费者才会建立队列。so 生产者，只会将消息发送到交换机】
## 创建连接–>创建channel–>创建交换机对象（设置交换机-名称、类型、标志、声明交换机）–>发送消息（交换机绑定队列）

$config = [
    'host'     => '127.0.0.1',
    'port'     => '5672',
    'login'    => 'guest',
    'password' => 'guest',
    'vhost'    => '/'
];
//1.创建链接
$conn = new AMQPConnection($config);
if(!$conn->connect()) {
    die("cannot connect to the broker!\n");
}
$channel = new AMQPChannel($conn);

//2.创建通道
$ex = new AMQPExchange($channel);

//3.交换机名称 为什么需要设置交换机名称？【类比为邮局】
$exchangeName = 'e_linvo';
$ex->setName($exchangeName);
//4.交换机类型有什么用？直接？
$ex->setType(AMQP_EX_TYPE_DIRECT);

//5. 设置标志有什么作用？持久化
$ex->setFlags(AMQP_DURABLE);

//6. 这个方法有啥用？
$ex->declareExchange();//声明一个新交换机，如果这个交换机已经存在了，就不需要再调用declareExchange()方法了.

//7.用来绑定交换机和队列
$routingKey = 'key_1';
for($i=0; $i<5; ++$i){
    echo "Send Message:".$ex->publish(date('H:i:s')."用户".$i."注册" , $routingKey )."\n";
}








