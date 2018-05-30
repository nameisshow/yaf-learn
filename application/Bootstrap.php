<?php
/**
 * Created by PhpStorm.
 * User: 19655
 * Date: 2018/5/27
 * Time: 17:23
 */

use Yaf\Bootstrap_Abstract;
use Yaf\Application;
use Yaf\Config\Ini;
use Yaf\Loader;
use Yaf\Registry;
use Yaf\Dispatcher;
use Yaf\Route\Regex;
use Yaf\Route\Rewrite;
use Yaf\Route\Supervar;

/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Bootstrap_Abstract
{

    // 加载公共函数
    public function _initFunctions(Dispatcher $dispatcher)
    {
        Loader::import(Application::app()->getConfig()->application->directory . '/functions/functions.php');
        //dump(Registry::get('config'));
    }


    public function _initConfig(Dispatcher $dispatcher)
    {
        //获取默认ini中的所有配置
        $config = Application::app()->getConfig();

        //加载其他路由配置文件
        //$routeRewrite = new Ini(APP_PATH . '/conf/route.ini', ini_get('yaf.environ'));
        $routeRewrite = new Ini(APP_PATH . '/conf/route.ini');

        //设置配置
        Registry::set("config", $config);

        //将config中属于routes对象的提取出来添加到路由中
        $dispatcher->getRouter()->addConfig(Registry::get("config")->routes);
        //同时将外部加载的路由也添加到路由中
        $dispatcher->getRouter()->addConfig($routeRewrite);
    }

    public function _initLog()
    {
        SeasLog::getBasePath();
        SeasLog::setLogger('yaf');
        SeasLog::warning('your {website} was down,please {action} it ASAP!',array('{website}' => 'github.com','{action}' => 'rboot'));


        SeasLog::alert('yes this is a {messageName}',array('{messageName}' => 'alertMSG'));

        SeasLog::emergency('Just now, the house next door was completely burnt out! {note}',array('{note}' => 'it`s a joke'));
    }

    public function _initDefaultName(Dispatcher $dispatcher)
    {
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }

    // 操作路由
    //public function _initRoute()
    //{
    //    // 添加路由
    //    $router = Dispatcher::getInstance()->getRouter();
    //    $router->addConfig(Registry::get('config')->routes);
    //    // 添加supervar类型路由
    //    $supervar = new Supervar('d');
    //    $router->addRoute('supervar',$supervar);
    //    // 添加rewirte类型路由
    //    $rewrite = new Rewrite(
    //        'goods/:goodsname/*',
    //        [
    //            'controller'=>'Index',
    //            'action'=>'showGoodsName',
    //        ]
    //    );
    //    $router->addRoute('rewrite',$rewrite);
    //    // 添加正则路由
    //    $reg = new Regex(
    //        'product/([a-zA-Z-_0-9]+)',
    //        [
    //            'controller'=>'Index',
    //            'action'=>'product',
    //        ],
    //        [
    //            1=>'ident',
    //        ]
    //    );
    //    $router->addRoute('product', $reg);
    //
    //
    //    //dump($router);die;
    //}

    //加载composer
    public function _initComposer(Dispatcher $dispatcher)
    {
        require_once APP_PATH . '/vendor/autoload.php';
    }
}