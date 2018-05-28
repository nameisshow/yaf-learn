<?php
/**
 * Created by PhpStorm.
 * User: 19655
 * Date: 2018/5/27
 * Time: 17:12
 */


use Yaf\Controller_Abstract;

class IndexController extends Controller_Abstract
{
    public function indexAction()
    {
        //$t = new Test();
        //$content = $t->to_test();
        //默认Action
        //toLog('index');
        $this->getView()->assign("content", "hello world");
    }

    public function echoAction()
    {
        $log = new Monolog\Logger('name');
        $log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));

        $log->addWarning('Foo');

        return false;
    }
}