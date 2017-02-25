<?php

namespace MyApp\Controllers\Test;

use MyApp\Controllers\ControllerBase;
use MyApp\Models\User;

class IndexController extends ControllerBase
{

    public function index()
    {
        $users = User::find();
        foreach ($users as $user) {
            dump($user->name);
            foreach ($user->book as $book) {
                dump($book->name);
            }
        }
    }

    public function api()
    {
        $users = User::find();
        return self::success($users);
    }

    public function cache()
    {
        $data = uniqid();
        $res = $this->cache->get('test', 60);
        if (empty($res)) {
            $this->cache->save('test', $data);
            $res = $this->cache->get('test');
        }
        return $res;
    }

    public function cookie()
    {
        $key = "TEST";
        $val = uniqid();
        // 检测cookie之前有没被设置过
        if ($this->cookies->has($key)) {
            // 获取cookie
            $rememberMeCookie = $this->cookies->get($key);
            // 获取cookie的值
            $value = $rememberMeCookie->getValue();
            dump($value);
        } else {
            $this->cookies->set(
                $key,
                $val,
                time() + 15 * 86400
            );
        }
    }

}

