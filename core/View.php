<?php
/**
 * Author: Ren Date: 2017/8/3 0003 Time: 上午 11:24
 */

namespace core;

/**
 * Class View
 * @package core
 * 视图层类
 */
class View
{
    //模板文件
    protected $file;
    //模板变量
    protected $vars = [];

    //读取文件
    public function make($file)
    {
        $this->file = 'view/'.$file.'.html';
        //返回对象，用于链式操作
        return $this;
    }

    //分配变量
    public function with($name, $value)
    {
        $this->vars[$name] = $value;
        //返回对象，用于链式操作
        return $this;
    }

    //加载模板
    public function __toString()
    {
        extract($this->vars);
        include $this->file;

        return '';
    }
}