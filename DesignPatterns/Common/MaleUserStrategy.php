<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 14:17
 */

namespace Common;


class MaleUserStrategy implements UserStrategy
{

    function showAd()
    {
        echo  "iphonex";
        // TODO: Implement showAd() method.
    }

    function showCategory()
    {
        echo "男装";
        // TODO: Implement showCategory() method.
    }
}