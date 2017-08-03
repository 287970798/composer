<?php
/**
 * Created by PhpStorm.
 * Author: Ren    wechat: yyloon
 * Date: 2017/8/3 0003
 * Time: 上午 10:19
 */

namespace web\controller;

use core\View;
use Gregwar\Captcha\CaptchaBuilder;

/**
 * Class Index
 * @package web\controller
 * 默认控制器
 */
class Index
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function show()
    {
        dump($_SESSION);
        return $this->view->make('index')->with('version', 'Version:1.0');
    }

    public function login()
    {
        return $this->view->make('login');
    }

    public function code()
    {
        header('Content-type:image/jpeg');
        $builder = new CaptchaBuilder();
        $builder->build();
        $_SESSION['phrase'] = $builder->getPhrase();
        $builder->output();
    }
}