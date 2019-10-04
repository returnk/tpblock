<?php

namespace app\admin\controller;

use think\Controller;

class Member extends Controller
{
//    会员页
    public function list()
    {
        $data = model('member')->order('create_time','desc')->paginate(5);
        return view('admin@member/list',compact('data'));
    }
//    会员添加
    public function add()
    {
        if(request()->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'email' => input('post.email'),
            ];
            $res = model('member')->add($data);
            if($res == 1) {
                return $this->success('会员添加成功','admin/member/list');
            }else {
                return $this->error($res);
            }

        }
        return view('admin@member/add');
    }
//    会员修改
    public function edit()
    {
        if(request()->isAjax()) {
            $data = [
                'id' => input('post.id'),
                'username' => input('post.username'),
                'oldpass' => input('post.oldpass'),
                'password' => input('post.password'),
                'email' => input('post.email'),
            ];
            $res = model('member')->edit($data);
            if($res == 1) {
                return $this->success('修改成功','admin/member/list');
            } else {
                return $this->error($res);
            }
        }
        $data = model('member')->find(input('id'));

        return view('admin@member/edit',compact('data'));
    }
//    会员删除
    public function del()
    {
        $art = model('member')->with('comment')->find(input('post.id'));
        $res = $art->together('comment')->delete();
        if($res) {
            return $this->success('删除成功','admin/member/list');
        } else {
            return $this->error('删除失败');
        }
    }
}
