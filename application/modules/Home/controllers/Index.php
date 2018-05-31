<?php
/**
 * Created by PhpStorm.
 * User: zhangbo
 * Date: 18-5-31
 * Time: 下午9:02
 */


// 不用写common模块，公共部分放在外层的controllers中，直接继承就可以了
class IndexController extends CommonController {

    public function indexAction()
    {
        dump('this is Home index');
        $this->commonAction();
        dump($this->getRequest()->getParams());
        $this->getView()->assign('content','来自home的变量');
        //$this->getView()->render('index.html');
        $this->getView()->display('index.html');
    }

    public function mysqlAction()
    {
        //$db = new DbModel();
        echo 'asd';
        $db = new DbModel();
        dump($db);
    }

}