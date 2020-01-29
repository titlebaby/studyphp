<?php
/**
 * Created by PhpStorm.
 * User: linger
 * Date: 2019-12-21
 * Time: 14:00
 */


//定时查询redis主机跟从机的偏移量，如果偏移量过高重新生成主从配置文件


//每个100ms

$redis = new Redis();
$redis->connect('127.0.0.1',6389);
swoole_timer_tick(100,function() use($redis){
    $replication = $redis->info('replication');
    $slaveCount = $replication['connected slaved'];
    for($i=0; $i<$slaveCount; $i++){
        // ip=47.98.147.49,port=6379,state=online,offset=5527,lag=0
        //if(主机-从机的偏移)
        $match = '';
        preg_match('/ip=(.*?),port(\d+),state=online,offset=(\d+)/',$replication['slave'.$i],$match);

        $masterOffset = $replication['master_repl_offset'];
        $ip = $match[1];
        $port = $match[2];
        $slaveOffset  = $match[3];
        //在延迟范围之内的，写入到正常的配置文件当中
        $slave = [];
        if($masterOffset-$slaveOffset <10){
            $slave[] = 'tcp://'.$ip.':'.$port.'?alias=salve-'.$i;
        } else {
            //延迟过高，发送警告信息给开发者、维护者
        }
        file_put_contents('config.php','<?php '.var_export($slave,true));
    }

});