<?php
/**
 * Author: Ren Date: 2017/8/3 0003 Time: 上午 10:49
 */

namespace core;

/**
 * Class Bootstrap
 * @package core
 * 核心类
 */
class Bootstrap
{
    public static function run()
    {
        session_start();
        self::parseUrl();
    }

    //分析URL，生成控制器方法常量
    public static function parseUrl()
    {
        if (isset($_GET['s'])) {
            //分析s参数，生成控制器方法
            $info = explode('/', $_GET['s']);
            $class = 'web\\controller\\'.ucfirst($info[0]);
            $action = $info[1];
        }else{
            //使用默认控制器及方法
            $class = 'web\\controller\\Index';
            $action = 'show';
        }
        //实例化对象，并输出控制器执行的结果
        echo (new $class)->$action();
    }
}