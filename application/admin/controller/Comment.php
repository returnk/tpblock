<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Comment extends Controller
{
    public function list()
    {
        $data = model('comment')->with('article,member')->order('create_time', 'desc')->paginate(1);
        return view('admin@comment/list', compact('data'));
    }
    // 删除评论
    public function del()
    {
        $id = input('id');
        $res = model('comment')->find($id);
        $res = $res->delete();
        if($res){
            return $this->success('删除成功','admin/comment/list');
        }else {
            return $this->error('删除失败');
        }
    }
}
