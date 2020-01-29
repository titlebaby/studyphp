<?php
/**
 * Created by PhpStorm.
 * User: linger
 * Date: 2020-01-29
 * Time: 18:19
 */

$config = [
    'host'     => '127.0.0.1',
    'port'     => '5672',
    'login'    => 'guest',
    'password' => 'guest',
    'vhost'    => '/'
];

## 创建连接–>创建channel–>创建交换机（这里创建交换机的作用？？）–>创建队列–>绑定交换机/队列/路由键–>接收消息
//1.链接

$conn = new AMQPConnection($config);
if(!$conn->connect()){
    die("cannot connect to the broker!");

}

$channel = new AMQPChannel($conn);

$exChangeName = 'e_linvo';
//2. 创建交换机【类比为邮局】 消费者中感觉不需要创建交换机。没有用同样可以正常消费

//$ex = new AMQPExchange($channel);
//
//$ex->setName($exChangeName);
//$ex->setType(AMQP_EX_TYPE_DIRECT);
//$ex->setFlags(AMQP_DURABLE);

//$ex->declareExchange();

//3. 创建队列
$queueName = 'queue1';
$q = new AMQPQueue($channel);
$q->setName($queueName);
$q->setFlags(AMQP_DURABLE);
$q->declareQueue();

//4. 用于绑定队列和交换机，跟send.php中的一致
$routingKey = 'key_1';//类比为邮件地址等收件人信息
$q->bind($exChangeName,$routingKey);

//5. 接受消息

$q->consume(function ($envelope, $queue){
    $msg = $envelope->getBody();
    //处理消息
    echo $msg."\n";

},AMQP_AUTOACK);

$conn->disconnect();
