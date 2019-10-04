<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Index extends Base
{
    // 过滤重复登录
    public function initialize()
    {
        if(session('admin.id')) {
            return $this->redirect('admin/home/index');
        }
    }
    // 后台登录
    public function login()
    {
        // 判断是否ajax请求
        if(request()->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
            ];
            $res = model('admin')->login($data);
            if($res == 1) {
                $this->success('登录成功',url('admin/home/index'));
            }else {
                $this->error($res);
            }
        }
       return view('admin@index/login');
    }
    // 注册账号
    public function register()
    {
        if(request()->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'conpass' => input('post.conpass'),
                'email' => input('post.email'),
                'nickname' => input('post.nickname'),
            ];
            $res = model('admin')->register($data);
            if($res == 1) {
                $this->success('注册成功','admin/index/login');
            } else {
                $this->error($res);
            }
        }
        return view('admin@index/register');
    }

}
