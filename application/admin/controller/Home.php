<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Home extends Base
{
    public function index()
    {
        return view('admin@home/index');
    }
    // 退出登录
    public function logout()
    {
        session(null);
        if(session('admin.id')) {
            return $this->error('系统繁忙');
        } else {
            return $this->success('退出成功','admin/index/login');
        }
    }
}
