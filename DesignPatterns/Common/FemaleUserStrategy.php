<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 14:16
 */

namespace Common;


class FemaleUserStrategy implements UserStrategy
{

    function showAd()
    {
        echo "彩妆";
        // TODO: Implement showAd() method.
    }

    function showCategory()
    {
        echo '女装';
        // TODO: Implement showCategory() method.
    }
}