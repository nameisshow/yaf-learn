<?php

use Yaf\Config\Ini;

/**
 * Created by PhpStorm.
 * User: zhangbo
 * Date: 18-5-31
 * Time: 下午10:27
 */

class DbModel {
    public function __construct()
    {
        $routeRewrite = new Ini(APP_PATH . '/conf/db.ini');
        dump($routeRewrite->db);
    }
}