<?php
/**
 * Created by PhpStorm.
 * User: 19655
 * Date: 2018/5/27
 * Time: 17:23
 */

use Yaf\Bootstrap_Abstract;
use Yaf\Application;
use Yaf\Registry;
use Yaf\Dispatcher;

/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Bootstrap_Abstract
{
    public function _initConfig()
    {
        $config = Application::app()->getConfig();
        Registry::set("config", $config);
    }

    public function _initDefaultName(Dispatcher $dispatcher)
    {
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }
}