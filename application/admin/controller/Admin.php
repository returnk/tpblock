<?php

namespace app\admin\controller;

use think\Controller;

class Admin extends Base
{
    public function list()
    {
        $data = model('admin')->order(['is_super'=>'desc','status'=>'desc'])->paginate(8);
        return view('admin@admin/list',compact('data'));
    }

    public function add()
    {
        if(request()->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'email' => input('post.email'),
            ];
            $res = model('admin')->add($data);
            if($res == 1) {
                return $this->success('会员添加成功','admin/member/list');
            }else {
                return $this->error($res);
            }

        }
        return view('admin@admin/add');
    }
}
