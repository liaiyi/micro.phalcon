<?php
// +----------------------------------------------------------------------
// | Crypt [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
// | Date: 2017/1/3 Time: 下午3:44
// +----------------------------------------------------------------------
use Phalcon\Crypt;

$di->set(
    "crypt",
    function () use ($config) {
        $crypt = new Crypt();

        $crypt->setKey($config->crypt->key); // 使用你自己的key！

        return $crypt;
    }
);