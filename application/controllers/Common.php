<?php

use Yaf\Controller_Abstract;
use Yaf\Registry;

/**
 * Created by PhpStorm.
 * User: zhangbo
 * Date: 18-5-31
 * Time: 下午8:56
 */
class CommonController extends Controller_Abstract{
    public function commonAction()
    {
        dump('this is common');
        $this->getView()->assign('viewpath',Registry::get('config')->commonViewPath);
        $this->getView()->assign('commonContent','来自common的变量');
        $this->getView()->assign('page','common说当前页是1');
    }
}