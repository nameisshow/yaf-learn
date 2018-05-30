<?php
/**
 * Created by PhpStorm.
 * User: 19655
 * Date: 2018/5/27
 * Time: 17:12
 */


use Yaf\Controller_Abstract;
use Yaf\Dispatcher;

class IndexController extends Controller_Abstract
{
    public function indexAction()
    {
        //$t = new Test();
        //$content = $t->to_test();
        //默认Action
        //toLog('index');
        dump($this->getRequest()->getParams());
        $this->getView()->assign("content", "hello world");
    }

    public function echoAction()
    {
        echo 'echo';
        $route = Dispatcher::getInstance()->getRouter();
        dump($route->getRoutes());

        return false;
    }

    public function showGoodsNameAction($goodsname)
    {
        echo $goodsname;
        dump($this->getRequest()->getParams());
        return false;
    }

    public function productAction($productName)
    {
        echo $productName;
        return false;
    }
}