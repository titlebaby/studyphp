<?php
/**
 * Created by PhpStorm.
 * User: linger
 * Date: 2019-12-21
 * Time: 13:59
 */

//模拟redis读写分离
//composer require predis/predis   会自动生成composer.json
require "vendor/autoload.php";

 $config = require "config.php";
 $redis = new Predis\Client($config,['repliaction'=>true]);
 $redis->set("test","123");
 $redis->get("test");