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
        //默认Action
        $this->getView()->assign("content", "here in admincation");
    }

    public function echoAction()
    {
        echo '你好';
        return false;
    }
}